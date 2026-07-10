
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/contact', function () {
    $allCategories = Category::all();
    return view('contact', compact('allCategories'));
});

Route::get('/admin/login', AdminLogin::class)->name('login')->middleware('guest:admins');

Route::group(['middleware' => 'auth:admins'], function() {
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

    Route::post('/logout', function (Request $request) {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
    });




