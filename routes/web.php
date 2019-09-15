<?php


Auth::routes();


Route::get('/', 'HomeController@index')->name('inicio');

Route::get('/home', 'HomeController@home');


Route::get('/posts','PostsController@index')->name('publications');

Route::get('/posts/create','PostsController@create')->name('publication');

Route::post('/posts/publicar','PostsController@store')->name('publish');

Route::get('/posts/delete/{id}', 'PostsController@delete')->name('delete_post');

Route::get('/like/{id}','PostsController@like')->name('like');

Route::get('/deslike/{id}','PostsController@deslike')->name('deslike');

Route::post('/comment/{id}', 'CommentController@comment');

Route::get('/comment/delete/{id}', 'CommentController@delete');

Route::get('/account/{id}', 'UserController@index')->name('account_user');

Route::post('/account/data', 'UserController@data')->name('data_user');

Route:: get('/account/delete/{id}', 'UserController@deleteaccount')->name('delete_account');

Route::resource('notifications', 'NotificationController');