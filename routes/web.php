<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('event', 'GuestController@indexEvent');
Route::get('event/{slug}', 'GuestController@showEvent');
Route::get('event/{campus}/{organization}/{category}', 'GuestController@filter');

Route::get('profile', 'UserController@profile');

// Admin
Route::get('root', 'AdminController@index');
Route::get('root/user-management','AdminController@indexUser');
Route::get('root/user-management/blocked','AdminController@indexDeletedUser');
Route::post('root/user-management/delete/{id}','AdminController@deleteUser');
Route::post('root/user-management/destroy/{id}','AdminController@destroyUser');
Route::post('root/user-management/restore/{id}','AdminController@restoreUser');
Route::post('root/user-management/update/{id}','AdminController@updateUser');
Route::post('root/user-management/reset-password/{id}','AdminController@resetPasswordUser');
