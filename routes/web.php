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

Route::match(['get','post'],'/','AuthController@login');
Route::match(['get','post'],'/admin/login','AuthController@login');
Route::match(['get','post'],'/forgot-password','AuthController@forgot_password');
Route::match(['get','post'],'/set-password/{security_code}/{user_id}','AuthController@set_password');
Route::match(['get','post'],'/logout','AuthController@logout');

Route::group(['prefix'=>'admin','middleware'=>'CheckAdminAuth'],function()
{
	//------Dahboard---------------------------------------------------------------------------
	Route::get('/home','Admin\AdminController@index');

	//------Dahboard---------------------------------------------------------------------------


	//------Manage User ---------------------------------------------------------------------------
	Route::get('/manage-users','Admin\UsersController@index');
	Route::any('/add-user','Admin\UsersController@add');
	Route::any('edit-user/{id}','Admin\UsersController@add');
	Route::any('delete-user/{id}','Admin\UsersController@delete');

	//------Manage User ---------------------------------------------------------------------------

    Route::match(['get','post'],'/reset-password','AuthController@reset_password');
    Route::match(['get','post'],'/my-profile','AuthController@my_profile');
    
    //=====================App- Setting=============================================
    Route::match(['get','post'],'/app-setting','Admin\AppSettingController@index');
    Route::match(['get','post'],'/app-setting/add','Admin\AppSettingController@add');
    Route::match(['get','post'],'/app-setting/edit/{id}','Admin\AppSettingController@edit');
    Route::match(['get','post'],'/app-setting/change-type','Admin\AppSettingController@change_type');
    Route::any('/app-setting/delete/{id}','Admin\AppSettingController@delete');
    //=====================App- Setting=============================================



    //=====================MCQ ==============================================
    Route::any('/mcq','Admin\McqController@index');
    Route::any('/mcq/add','Admin\McqController@add_question');
    Route::any('/mcq/edit/{id}','Admin\McqController@edit_question');
    Route::any('/mcq/delete/{id}','Admin\McqController@delete');
    //=====================MCQ ==============================================
   

    //=================Report Management =============================
    Route::match(['get','post'],'/report-list','Admin\ReportController@index'); 
    Route::match(['get','post'],'/report-list/details','Admin\ReportController@details'); 
    //=================Report Management =============================



});
define('CommonError','Something went erong, Please try again later.');
