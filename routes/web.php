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
Route::get('/intro', 'LandingpageController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/install/check-db', 'HomeController@checkConnectDatabase');

Route::get('/update', function () {
    return redirect('/');
});

//Cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cleared!";
});

//Login
Auth::routes();
//Custom User Login and Register
Route::post('register', '\Modules\User\Controllers\UserController@userRegister')->name('auth.register');
Route::post('login', '\Modules\User\Controllers\UserController@userLogin')->name('auth.login');
Route::post('logout', '\Modules\User\Controllers\UserController@logout')->name('auth.logout');
// Social Login
Route::get('social-login/{provider}', 'Auth\LoginController@socialLogin')->name('social.login');
Route::get('social-callback/{provider}', 'Auth\LoginController@socialCallBack')->name('social.callback');

// Logs
Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard', 'system_log_view']);
Route::get('fix-locations', '\App\Http\Controllers\DevController@fixLocations')->name('fixLocations');

Route::get('redirectLogin', '\Modules\User\Controllers\UserController@redirectLogin')->name('auth.redirectLogin');
