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
//Frontend nav
Route::get('/', 'Frontend\FrontendController@index')->name('index');

Route::get('/detail/{slag}', 'Frontend\FrontendController@detail')->name('detail');
//super admin route group..
Route::group(['middleware'=>['auth','admin']], function (){
    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin',], function (){
//        Route::resource('blog-category', 'BlogCategoryController');
        Route::resource('post', 'PostController');
//        Route::resource('blog-post', 'BlogPostController');
//        Route::resource('slider', 'SliderController');

    });

    Route::get('admin/dashboard','Admin\DashboardController@index')->name(
        'admin.dashboard');

});

Auth::routes();

