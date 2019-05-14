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

Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::get('post/{id}', ['as'=>'home.post','uses'=>'HomeController@post']);


Route::group(['middleware' => 'admin'], function() {

	Route::get('/admin', 'AdminController@index');
	
Route::resource('/admin/users', 'AdminUsersController', ['as' => 'admin']);
Route::resource('admin/posts', 'AdminPostsController', ['as'=>'admin']);
Route::resource('admin/categories', 'AdminCategoriesController', ['as'=>'admin']);
Route::resource('admin/media', 'AdminMediaController', ['as'=>'admin']);
Route::resource('admin/comments', 'PostCommentController', ['as'=>'admin']);
Route::resource('admin/comment/replies', 'CommentRepliesController', ['as'=>'admin']);
});

Route::post('admin/delete/media', 'AdminMediaController@deleteMedia');

Route::group(['middleware' => 'auth'], function() {
    
    Route::post('comment/reply', 'CommentRepliesController@createReply');
    
});

Route::post('/search', 'HomeController@search');

