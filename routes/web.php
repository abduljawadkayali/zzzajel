<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('logindash', 'logindash@index');

Route::get('/about', 'HomeController@about');

Route::get('/services', 'HomeController@services');

Route::get('/contactus', 'HomeController@contactus');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::middleware(['auth'])->group(function () {
// your routes here


Route::resource('users', 'UserController');

Route::Get('profile', 'UserController@profile');

Route::PUT('users.updateUser/{id}', 'UserController@updateUser')->name('users.updateUser');

Route::Get('Me', 'UserController@Me');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('crud','CrudController');

Route::resource('image','ImageController');

Route::resource('staff','StaffController');

Route::resource('company','CompanyController');

Route::resource('background','BackgroundController');


Route::resource('video','VideoController');


Route::resource('contact','ContactController');


Route::resource('service','ServiceController');


Route::resource('price','PriceController');


Route::resource('en','EnController');

Route::resource('bus','Editor\BusController');

    Route::resource('device','Editor\DeviceController');

    Route::resource('balance','Editor\BalanceController');

    Route::resource('payment','Editor\PaymentController');

    Route::resource('odeme','Editor\OdemeController');
});
