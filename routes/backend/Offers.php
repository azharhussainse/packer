<?php

// Pages Management
Route::group(['namespace' => 'Offers'], function () {
    Route::resource('offers', 'OffersController', ['except' => ['show']]);

    //For DataTables
    Route::post('offers/get', 'OffersTableController')->name('offers.get');
    Route::get('offers/get', 'OffersTableController')->name('offers.get');
});
