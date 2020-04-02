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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/start', 'StartController@index')->name('start.index');

Route::get('/profil', 'ProfilController@index')->name('profil.index');

//Route::get('/chat', 'ChatController@getMessage')->name('message');

Route::get('/chat', 'ChatController@index')->name('message');

// Marius hinzugefügt zum testen
Route::get('/chats', 'ChatController@index')->name('chat.index');


Route::resources([
    'profile' => 'ProfileController'

]);



Route::get('/profile/delete/{profile}', 'ProfileController@delete')->name('profile.delete');

// PK 01.04.20
Route::post('/like', 'LikeController@index')->name('like');


// PK 02.04.20
Route::resources([
    'like' => 'LikeController'

]);
