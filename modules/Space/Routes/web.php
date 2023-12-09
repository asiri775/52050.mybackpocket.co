<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('space.space_route_prefix')],function(){
    Route::get('/','SpaceController@index')->name('space.search'); // Search
    Route::post('/add-to-favourite','SpaceController@addToFavourite'); // add to favourite
    Route::get('/{slug}','SpaceController@detail')->name('space.detail');// Detail
});


Route::group(['prefix'=>'user/'.config('space.space_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageSpaceController@manageSpace')->name('space.vendor.index');
    Route::get('/create','ManageSpaceController@createSpace')->name('space.vendor.create');
    Route::get('/edit/{id}','ManageSpaceController@editSpace')->name('space.vendor.edit');
    Route::get('/del/{id}','ManageSpaceController@deleteSpace')->name('space.vendor.delete');
    Route::post('/store/{id}','ManageSpaceController@store')->name('space.vendor.store');
    Route::post('/set-defult-price/{id}','ManageSpaceController@setDefultPrice')->name('space.vendor.defult.price');
    Route::get('bulkEdit/{id}','ManageSpaceController@bulkEditSpace')->name("space.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','ManageSpaceController@bookingReportBulkEdit')->name("space.vendor.booking_report.bulk_edit");
	Route::get('clone/{id}','ManageSpaceController@cloneSpace')->name("space.vendor.clone");
    Route::get('/recovery','ManageSpaceController@recovery')->name('space.vendor.recovery');
    Route::get('/restore/{id}','ManageSpaceController@restore')->name('space.vendor.restore');

    Route::post('/update-space-booking/{id}','ManageSpaceController@updateBooking')->name('space.vendor.availability.updateBooking');

});

Route::group(['prefix'=>'user/'.config('space.space_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('space.vendor.availability.index');
        Route::get('/available-dates','AvailabilityController@availableDates')->name('space.vendor.availability.availableDates');
        Route::get('/calendar-events','AvailabilityController@calendarEvents')->name('space.vendor.availability.calendarEvents');
        Route::post('/confirm-block-date/{id}','AvailabilityController@confirmBlockDate')->name('space.vendor.availability.confirmBlockDate');

        Route::get('/loadDates','AvailabilityController@loadDates')->name('space.vendor.availability.loadDates');
        Route::post('/verifySelectedTimes','AvailabilityController@verifySelectedTimes')->name('space.vendor.availability.verifySelectedTimes');
        Route::post('/store','AvailabilityController@store')->name('space.vendor.availability.store');
    });
});
