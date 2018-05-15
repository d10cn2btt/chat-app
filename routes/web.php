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
    return redirect()->route('chat-room.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessages');

Route::get('/friends', 'FriendsController@index')->middleware('auth');

Route::group(['prefix' => '/chat-room', 'middleware' => ['auth']], function () {
    Route::get('/', 'ChatRoomController@index')->name('chat-room.index');
    Route::get('/{userId}', 'ChatRoomController@show')->name('chat-room.show');
    Route::post('/history/{chatRoomId}', 'ChatRoomController@history')->name('chat-room.history');
    Route::post('/sendChat', 'ChatRoomController@sendChat')->name('chat-room.send-chat');
});

Route::post('/notification/listAll', 'NotificationController@listAll');
