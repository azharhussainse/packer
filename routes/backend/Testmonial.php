<?php

// Faq Management
Route::group(['namespace' => 'Testmonials'], function () {
    Route::resource('testmonials', 'TestmonialsController', ['except' => ['show']]);

    //For DataTables
    Route::post('testmonials/get', 'TestmonialsTableController')->name('testmonials.get');
});
