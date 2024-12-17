<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'homepage'])->name('homepage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tests', TestController::class);

    Route::get('/post_page', [AdminController::class, 'post_page'])->name('admin.post_page');
Route::post('/add_post', [AdminController::class, 'add_post'])->name('admin.add_post');
Route::get('/show_post', [AdminController::class, 'show_post'])->name('admin.show_post');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->name('admin.delete_post');
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page'])->name('admin.edit_page');
Route::post('/update_post/{id}', [AdminController::class, 'update_post'])->name('admin.update_post');

// Single Post Details
Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->name('post.details');

// Category Routes
Route::post('/create_category', [AdminController::class, 'createCategory'])->name('admin.createCategory');
Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
Route::get('/edit_category/{id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
Route::put('admin/update_category/{id}', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');
Route::delete('/admin/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

});
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Post Routes

// Category Posts
Route::get('/category/{category}', [HomeController::class, 'category_posts'])->name('category.posts');

// Category Controller
Route::get('category/{slug}', [CategoryController::class, 'posts'])->name('category.posts');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// About Route
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Services Route
Route::get('/services', [HomeController::class, 'services'])->name('services');

// User Post Route (assuming this is for the user's own posts)
Route::post('/user_post', [HomeController::class, 'user_post'])->name('user.post');
