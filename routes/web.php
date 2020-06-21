<?php

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

use Illuminate\Support\Facades\Route;

//************************************************//
//****************** WEBSITE *********************//
//************************************************//

Route::view('', 'website.index')->name('website.home');
Route::view('/contact', 'website.contact')->name('website.contact');
Route::get('/lega',function (){
    return view('website.news');
})->name('news');
Route::get('/last_news',function (){
    return view('website.LastNews');
})->name('LastNews');
Route::get('/variousNews',function (){
    return view('website.VariousSport');
})->name('various');

//***********************   *************************//
//****************** CMS-ADMIN *******************//
//************************************************//
Route::prefix('cms/admin/')->namespace('Auth')->group(function () {
    Route::get('login', 'AdminAuthController@showLoginView')->name('cms.admin.login_view');
    Route::post('login', 'AdminAuthController@login')->name('cms.admin.login');
    Route::view('blocked', 'cms.blocked')->name('cms.admin.blocked');

    Route::get('forgot-password', 'AdminAuthController@showForgetPassword')->name('cms.admin.forgot_password_view');
    Route::post('forgot-password', 'AdminAuthController@requestNewPassword')->name('cms.admin.forgot_password');
});

Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {
    Route::view('', 'cms.admin.dashboard')->name('cms.admin.dashboard');
    Route::get('password/reset', 'Auth\AdminAuthController@showResetPasswordView')->name('cms.admin.password_reset_view');
    Route::post('password/reset', 'Auth\AdminAuthController@resetPassword')->name('cms.admin.password_reset');
    Route::get('logout', 'Auth\AdminAuthController@logout')->name('cms.admin.logout');
});

Route::prefix('cms/admin/categories/')->middleware('auth:admin')->group(function () {
    Route::get('{id}/articles', 'CategoryController@showArticles')->name('category.articles');
    Route::get('{id}/authors', 'CategoryController@showAuthors')->name('category.authors');
});

Route::prefix('cms/admin/author/')->middleware('auth:admin')->group(function () {
    Route::get('{id}/articles', 'AuthorController@showArticles')->name('author.articles');
    Route::get('{id}/categories', 'AuthorController@showCategories')->name('author.categories');
});

Route::resource('cms/admin/categories', 'CategoryController')->middleware('auth:admin');
Route::resource('cms/admin/users', 'UserController')->middleware('auth:admin');
Route::resource('cms/admin/authors', 'AuthorController')->middleware('auth:admin');
Route::resource('cms/admin/admins', 'AdminController')->middleware('auth:admin');
Route::resource('cms/admin/articles', 'ArticleController')->middleware('auth:admin');

//************************************************//
//****************** CMS-AUTHOR ******************//
//************************************************//

Route::prefix('cms/author/')->namespace('Auth')->group(function () {
    Route::get('login', 'AuthorAuthController@showLoginView')->name('cms.author.login_view');
    Route::post('login', 'AuthorAuthController@login')->name('cms.author.login');
});

Route::prefix('cms/author/')->middleware('auth:author')->group(function () {
    Route::view('', 'cms.author.dashboard')->name('cms.author.dashboard');
    Route::get('logout', 'Auth\AuthorAuthController@logout')->name('cms.author.logout');
});
