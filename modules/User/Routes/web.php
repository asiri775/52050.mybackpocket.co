<?php

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'verified']], function () {
    Route::match(['get'], '/dashboard', 'UserController@dashboard')->name("vendor.dashboard");
    Route::post('/reloadChart', 'UserController@reloadChart');
    Route::get('/user-dashboard', 'UserController@userDashboard')->name("user.dashboard");

    Route::get('/profile', 'UserController@profile')->name("user.profile.index");
    Route::post('/profile', 'UserController@profileUpdate')->name("user.profile.update");
    Route::get('/profile/change-password', 'UserController@changePassword')->name("user.change_password");
    Route::post('/profile/change-password', 'UserController@changePasswordUpdate')->name("user.change_password.update");
    Route::get('/bookings-details', 'UserController@bookingsDetails')->name("user.bookings.details");
    Route::post('/bookings-data-table', 'BookingsTableController')->name("user.bookings.datatable");
    Route::get('/booking-details/{id}', 'UserController@singleBookingDetails')->name("user.single.booking.detail");
    Route::get('/enquiry-report', 'UserController@enquiryReport')->name("vendor.enquiry_report");
    Route::get('/enquiry-report/bulkEdit/{id}', 'UserController@enquiryReportBulkEdit')->name("vendor.enquiry_report.bulk_edit");

    Route::post('/get-boooking-detail', 'UserController@getBooking')->name('user.bookings.get.detail');
    Route::post('/boooking-cancel', 'UserController@cancelBooking')->name('user.bookings.get.cancel');

    Route::post('/wishlist', 'UserWishListController@handleWishList')->name("user.wishList.handle");
    Route::get('/wishlist', 'UserWishListController@index')->name("user.wishList.index");
    Route::get('/wishlist/remove', 'UserWishListController@remove')->name("user.wishList.remove");

    Route::get('/favourites', 'UserController@favourites')->name("user.favourites");
    Route::post('/favourites-data-table', 'UserController@favourites_datatable')->name("user.favourites.datatable");
    Route::get('/remove-favourite/{id}', 'UserController@removeFavourite')->name('user.favourite.remove');

    Route::post('/bookings-search', 'UserController@bookingsSearch')->name('user.bookings.search');

    Route::group(['prefix' => 'verification'], function () {
        Route::match(['get'], '/', 'VerificationController@index')->name("user.verification.index");
        Route::match(['get'], '/update', 'VerificationController@update')->name("user.verification.update");
        Route::post('/store', 'VerificationController@store')->name("user.verification.store");
        Route::post('/send-code-verify-phone', 'VerificationController@sendCodeVerifyPhone')->name("user.verification.phone.sendCode");
        Route::post('/verify-phone', 'VerificationController@verifyPhone')->name("user.verification.phone.field");
    });

    Route::group(['prefix' => '/booking'], function () {
        Route::get('{code}/invoice', 'BookingController@bookingInvoice')->name('user.booking.invoice');
        Route::post('bulk-invoice', 'BookingController@bulkBookingInvoice')->name('user.booking.bulk.invoice');
        Route::post('export-invoices', 'BookingController@exportBookings')->name('user.booking.export');
        Route::get('{code}/ticket', 'BookingController@ticket')->name('user.booking.ticket');
        Route::get('archive/{id}', 'BookingController@archive')->name('user.booking.archive');
    });

    Route::match(['get'], '/upgrade-vendor', 'UserController@upgradeVendor')->name("user.upgrade_vendor");

    Route::get('wallet', 'WalletController@wallet')->name('user.wallet');
    Route::get('wallet/buy', 'WalletController@buy')->name('user.wallet.buy');
    Route::post('wallet/buyProcess', 'WalletController@buyProcess')->name('user.wallet.buyProcess');

    Route::get('chat', 'ChatController@index')->name('user.chat');
});

Route::group(['prefix' => config('chatify.path'), 'middleware' => 'auth'], function () {
    Route::get('/', 'ChatController@iframe')->name(config('chatify.path'));
    Route::post('search', 'ChatController@search')->name('search');
    Route::post('getContacts', 'ChatController@getContacts')->name('contacts.get');
    Route::post('idInfo', 'ChatController@idFetchData');
    Route::post('sendMessage', 'MessageController@send')->name('send.message');
});


Route::get('main-search', 'UserController@mainSearch')->name('main.search');

Route::group(['prefix' => 'profile'], function () {
    Route::match(['get'], '/{id}', 'ProfileController@profile')->name("user.profile");
    Route::match(['get'], '/{id}/reviews', 'ProfileController@allReviews')->name("user.profile.reviews");
    Route::match(['get'], '/{id}/services', 'ProfileController@allServices')->name("user.profile.services");
});

//NewsletterRoute::group(['prefix'=>'gateway'],function(){
    Route::get('/confirm/{gateway}','NormalCheckoutController@confirmPayment')->name('gateway.confirm');
    Route::get('/cancel/{gateway}','NormalCheckoutController@cancelPayment')->name('gateway.cancel');
    Route::get('/info','NormalCheckoutController@showInfo')->name('gateway.info'); 
    Route::get('/update-amount','NormalCheckoutController@updateAmount')->name('gateway.update');
});
Route::post('newsletter/subscribe', 'UserController@subscribe')->name('newsletter.subscribe'); 


