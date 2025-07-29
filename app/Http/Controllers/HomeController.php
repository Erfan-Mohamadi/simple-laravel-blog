<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = \App\Models\Slider::where('status', 1)->latest()->get();
        $posts = Post::with(['category', 'user'])
            ->where('status', 1)
            ->latest()
            ->paginate(4);
        $categories = DB::select('select * from categories where status = ?', [1]);

        return view('home.index', compact('sliders', 'posts', 'categories'));
    }
    public function getImage(): string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : asset('assets/img/prod-1.jpg');
    }
}
