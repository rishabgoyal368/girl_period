<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::post('/check-login', 'ApiController@check_login');

Route::post('/register', 'ApiController@user_registration');

Route::post('/login', 'ApiController@user_login');
Route::post('/forgot-password','ApiController@forgot_password');
Route::post('/reset-password','ApiController@reset_password');

Route::post('/logout','ApiController@logout'); 
Route::post('/get-profile','ApiController@profile'); 
Route::post('/update-profile','ApiController@updateProfile'); 

Route::post('/get-articles','Api\ContentController@get_article');

Route::post('/add-user-notes','Api\UserController@add_user_notes');
Route::post('/user-profile','Api\UserController@user_profile');
Route::post('/setting','Api\UserController@setting');


Route::post('/setting/update','Api\UserController@setting_update');
Route::post('/add-period-date','Api\UserController@add_period_date');
Route::post('/get-next-period-date','Api\UserController@get_next_period_date');

Route::post('/privacy-policy','Api\ContentController@PrivacyPolicy');
