<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->when($request->input('q'), function ($query) use ($query) {
                return $query->where('title', 'like', '%' . $query . '%');
            })
            ->with(['category', 'user'])
            ->paginate(4);

        $categories = Category::where('status', 1)->get();

        return view('posts.search-results', compact('posts', 'query', 'categories'));
    }

    public function show(Post $post)
    {
        $categories = Category::where('status', 1)->get();

        return view('posts.single', compact('post', 'categories'));
    }
}
