
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AdminLogin;
use App\Livewire\Dashboard\AdminDashboard;
use App\Livewire\Authors\AddAuthor;
use App\Livewire\Posts\AddPost;
use App\Livewire\Posts\ShowPost;
use App\Livewire\Categories\AddCategory;   // FIXED: Changed categories to Categories
use App\Livewire\Categories\ShowCategory;  // FIXED: Changed categories to Categories
use App\Livewire\Authors\ShowAuthor;
use App\Livewire\Categories\EditCategory;
use App\Livewire\Authors\EditAuthor;
// use App\Livewire\Posts\EditPost;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', AdminLogin::class)->name('login');
// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/author', AddAuthor::class)->name('author');
    Route::get('/author-list', ShowAuthor::class)->name('authors');
    Route::get('/post', AddPost::class)->name('post');
    Route::get('/post-list', ShowPost::class)->name('posts');
    Route::get('/category', AddCategory::class)->name('category');
    Route::get('/category-list', ShowCategory::class)->name('categories');
    Route::get('/admin/categories/edit/{id}', EditCategory::class)->name('categories.edit');
    Route::get('/admin/posts/edit/{id}', 'App\Livewire\Posts\EditPost')->name('posts.edit');
    Route::get('/admin/authors/edit/{id}', EditAuthor::class)->name('authors.edit');
// });



