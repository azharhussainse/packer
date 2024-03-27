<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
    Route::group(['namespace' => 'Group', 'as' => 'group.'], function () {
        Route::resource('groups','GroupsController');
    });
    Route::resource('chats','ChatsController');
    Route::resource('messages','MessagesController');
    Route::resource('notifications','NotificationsController');
    Route::resource('requests','RequestsController')->except(['index','show']);
    Route::resource('offers','OffersController');
    Route::get('my-orders','RequestsController@orders')->name('myorders');
    Route::get('trending/{name}', [BlogController::class, 'trending'])->name('trending');

    // Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
    Route::post('paypal','PaypalController@postPaymentWithpaypal')->name('payment-paypal');

    Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


});
Route::get('/requests','RequestsController@index')->name('requests.index');
Route::get('/requests/{slug}','RequestsController@show')->name('requests.show');
