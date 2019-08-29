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
Route::get('foodlab/{slug}', ['as' => 'foodlab.single', 'uses' => 'FoodlabController@getSingle'])
    ->where('slug', '[\w\d\-\_]+'); 
Route::get('foodlab', ['uses' => 'FoodlabController@getIndex', 'as' => 'foodlab.index']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts', 'PostController')->middleware('auth');;

//route za rating system
Route::post('/rating/{post}', 'PostController@postStar')->name('postStar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//pokušaj grupiranja admin routes
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
    Route::resource('admin/routes/admin_posts', 'AdminPostController');
    Route::resource('admin/routes/admin_users', 'AdminUserController');
});

//Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
