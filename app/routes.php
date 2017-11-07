<?php

Route::model('user', 'User');
Route::model('album', 'Album');
Route::model('picture', 'Picture');
Route::model('video', 'Video');

Route::pattern('user', '[0-9]+');
Route::pattern('album', '[0-9]+');
Route::pattern('picture', '[0-9]+');
Route::pattern('video', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Album Management
    Route::get('albums', 'AdminAlbumsController@getIndex'); # Remover quando for definir roles (filters.php)
    Route::get('albums/{album}/show', 'AdminAlbumsController@getShow');
    Route::get('albums/{album}/edit', 'AdminAlbumsController@getEdit');
    Route::post('albums/{album}/edit', 'AdminAlbumsController@postEdit');
    Route::get('albums/{album}/pictures', 'AdminAlbumsController@getUploadPictures');
    Route::post('albums/{album}/pictures', 'AdminAlbumsController@postUploadPictures');
    Route::get('albums/{album}/pictures/{picture}/delete', 'AdminAlbumsController@getDeletePicture');
    Route::get('albums/{album}/videos', 'AdminAlbumsController@getVideos');
    Route::post('albums/{album}/videos', 'AdminAlbumsController@postVideos');
    Route::get('albums/{album}/videos/{video}/delete', 'AdminAlbumsController@getDeleteVideo');
    Route::controller('albums', 'AdminAlbumsController');

    # Admin Profile
    Route::get('profile/show', 'AdminProfileController@getShow');
    Route::post('profile/edit', 'AdminProfileController@postEdit');
    Route::controller('profile', 'AdminProfileController');

    # Admin Dashboard
    Route::get('/', 'AdminDashboardController@getIndex');
    Route::controller('dashboard', 'AdminDashboardController');
});

Route::post('user/login', 'UserController@postLogin');
Route::controller('user', 'UserController');

Route::get('{albumSlug}', 'AlbumController@getView');

Route::get('/', 'HomeController@getIndex');
