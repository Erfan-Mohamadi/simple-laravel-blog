<?php

use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as FrontendPostController;
use App\Http\Controllers\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

/*-------------------------------------------------
| Home Section Routes
|------------------------------------------------*/
//Route::redirect('/', '/home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Post Routes (Frontend)
Route::get('/search', [FrontendPostController::class, 'search'])->name('posts.search');
Route::get('/posts', [FrontendPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [FrontendPostController::class, 'show'])->name('posts.show');
// Category Routes (Frontend)

Route::get('/posts/categories/{category}', [FrontendPostController::class, 'category'])->name('posts.categories');


/*-------------------------------------------------
| Admin Section Routes
|------------------------------------------------*/
// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Authenticated Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('throttle:3,1');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // Slider
    Route::resource('sliders', SliderController::class);
    // Posts (Admin)
    Route::resource('posts', AdminPostController::class);
    //sliders
});
