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

    //===================== Manage Articles ==============================================
    
    Route::any('/manage-article','Admin\ManageArticleController@index');
    Route::any('/manage-article/add','Admin\ManageArticleController@add');
    Route::any('/manage-article/edit/{id}','Admin\ManageArticleController@add');
    Route::any('/manage-article/delete/{id}','Admin\ManageArticleController@delete');

    //===================== Manage Articles ==============================================



});
define('CommonError','Something went erong, Please try again later.');
