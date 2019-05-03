<?php

use Illuminate\Http\Request;

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

Route::post('{token}/register', 'Api\UserController@register');
Route::post('{token}/login', 'Api\UserController@login');
Route::get('{token}/campus/index', 'Api\CampusController@indexCampus');
Route::get('{token}/faculty/show/{id}', 'Api\CampusController@showFaculty');
Route::get('{token}/program-study/show/{id}', 'Api\CampusController@showProgramStudy');

// ->middleware('jwt.verify')
