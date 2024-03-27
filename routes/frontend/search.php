<?php
Route::get('search', 'SearchController@index')->name('search');
Route::get('cities', 'SearchController@cities')->name('cities');
Route::get('delete-notification','SearchController@deleteNotification')->name('delete-notification');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::get('autocomplete-user', 'SearchController@autocompleteUser')->name('autocomplete-user');

Route::get('page/{slug}', 'SearchController@page');
Route::get('profile/{id}', 'SearchController@userProfile');
Route::post('addreview', 'SearchController@addReview')->name('addreview');
Route::get('faqs', 'SearchController@faqs');
Route::post('orderComplete', 'SearchController@orderComplete')->name('order.complete');
