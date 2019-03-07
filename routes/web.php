<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('event', 'GuestController@indexEvent');
Route::get('event/{slug}', 'GuestController@showEvent');
Route::get('event/{campus}/{organization}/{category}', 'GuestController@filter');
Route::get('event/{slug}/process', 'TransactionController@processTransaction');
Route::post('event/{slug}/process', 'TransactionController@postProcessTransaction');
Route::post('event/search', 'GuestController@search');

Route::get('/kontak', function(){	return view('guest.kontak'); });
Route::get('/register-organization','UserController@showRegisterOrganization');
Route::post('/store-register-organization', 'UserController@storeRegisterOrganization');


Route::get('profile', 'UserController@profile');
Route::get('get-campus', 'UserController@getDataCampus');
Route::get('get-faculty', 'UserController@getDataFaculty');
Route::get('get-program-study', 'UserController@getDataProgramStudy');
Route::post('update-profile-user', 'UserController@updateDataProfileUser');
Route::post('update-kampus-user', 'UserController@updateDataKampusUser');
Route::post('update-login-user', 'UserController@updateDataLoginUser');


Route::get('transaction', 'TransactionController@indexTransaction');
Route::get('transaction/{id}', 'TransactionController@showTransaction');
Route::get('get-all-sub-event', 'GuestController@getDataSubEvent');


Route::get('organization/{ig}', 'OrganizationController@home');
Route::get('organization/{ig}/profile', 'OrganizationController@profile');
Route::post('organization/{ig}/profile', 'OrganizationController@saveProfile');

Route::get('organization/{ig}/event/add-big-event', 'OrganizationController@addBigEvent');
Route::post('organization/{ig}/event/add-big-event', 'OrganizationController@storeBigEvent');

Route::get('organization/{ig}/event/add', 'OrganizationController@addEvent');
Route::post('organization/{ig}/event/add', 'OrganizationController@storeEvent');

Route::get('organization/{ig}/event', 'OrganizationController@event');
Route::get('organization/{ig}/event/{slug}', 'OrganizationController@searchEvent');

//Alfikri
//Guest
Route::get('/kontak', function(){
	return view('guest.kontak');
});
//user
Route::get('/register_organization', function(){
	return view('user.register_organization');
});
//superadmin
Route::get('/superadminrambo', function(){
	return view('superAdmin.login');
});
Route::get('/superadmin/home', function(){
	return view('superAdmin.home');
});
