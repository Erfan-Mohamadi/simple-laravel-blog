<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Search posts by title or body
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->with(['category', 'user'])
            ->paginate(4);

        $categories = Category::where('status', 1)->get();

        return view('posts.search-results', compact('posts', 'query', 'categories'));
    }

    /**
     * Show single post
     */
    public function show(Post $post)
    {
        $categories = Category::where('status', 1)->get();

        return view('posts.single', compact('post', 'categories'));
    }

    /**
     * Show posts filtered by category
     */
    public function category(Category $category)
    {
        $posts = $category->posts()
            ->where('status', 1)
            ->with(['category', 'user'])
            ->latest()
            ->paginate(10);

        $categories = Category::where('status', 1)->get();

        return view('posts.categories', compact('posts', 'category', 'categories'));
    }
}
