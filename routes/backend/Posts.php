<?php

// Pages Management
Route::group(['namespace' => 'Posts'], function () {
    Route::resource('posts', 'PostsController', ['except' => ['show']]);

    //For DataTables
    Route::post('posts/get', 'PostsTableController')->name('posts.get');
    Route::get('posts/get', 'PostsTableController')->name('posts.get');
});
