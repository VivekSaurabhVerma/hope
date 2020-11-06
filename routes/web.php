<?php

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
// Users
Route::get('/', 'PostsController@index')->name('allposts');
Route::get('/admin', 'PostsController@admin');

Route::get('/create','PostsController@create')->name('createpost');
Route::post('/posts','PostsController@store')->name('storepost');

// <<<<<<< HEAD
// Admins

Route::get('/is_verified/{id}','PostsController@verify');

Route::get('/edit/{id}','PostsController@edit');
Route::put('/update/{id}','PostsController@update');


Auth::routes();

// >>>>>>> 39d1d925de2c79df327dccc41f56ac1c3eae2a0e
Route::get('/home', 'HomeController@index')->name('showanonymousposts');
Route::get('/adminposts', 'HomeController@adminposts')->name('showadminposts');
Route::get('/admin/create','HomeController@create')->name('adminpost');
Route::post('/adminpost','HomeController@store')->name('adminstorepost');
Route::any('/approve/{id}','HomeController@approve')->name('approvepost');
Route::get('/edit/{id}','HomeController@edit')->name('editpost');
Route::put('/update/{id}','HomeController@update')->name('updatepost');
Route::delete('/delete/{id}','HomeController@destroy')->name('deletepost');
// Route::get('/admin/anonymousposts','HomeController@userposts');
Auth::routes();
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
