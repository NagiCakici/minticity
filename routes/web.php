<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(homeController::class)->prefix('/')->group(function () {

    Route::get('/','index')->name('home');
    Route::get('/category-list', 'categoryList')->name('categoryList');
    Route::get('/category-new', 'newCategory')->name('newCategory');
    Route::get('/category-edit/{id}', 'editCategory')->name('editCategory');
    Route::post('/category-add', 'addCategory')->name('addCategory');
    Route::post('/category-update', 'updateCategory')->name('updateCategory');
    Route::delete('/category-delete/{id}', 'deleteCategory')->name('deleteCategory');

    
});
Route::controller(blogController::class)->prefix('/')->group(function () {

    Route::get('/blog-list/{id}', 'blogList')->name('blogList');
    Route::get('/blog-new', 'newBlog')->name('newBlog');
    Route::get('/blog-edit/{id}', 'editBlog')->name('editBlog');
    Route::post('/blog-add', 'addBlog')->name('addBlog');
    Route::post('/blog-update', 'updateBlog')->name('updateBlog');
    Route::delete('/blog-delete/{id}', 'deleteBlog')->name('deleteBlog');
    
});
