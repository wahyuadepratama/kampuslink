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


Route::get('organization/{name}', 'OrganizationController@home');
Route::get('organization/{name}/profile', 'OrganizationController@profile');
Route::post('organization/{name}/profile', 'OrganizationController@saveProfile');

Route::get('organization/event/add-big-event', 'OrganizationController@addBigEvent');
Route::post('organization/event/add-big-event', 'OrganizationController@storeBigEvent');

Route::get('organization/event/add', 'OrganizationController@addEvent');
Route::post('organization/event/add', 'OrganizationController@storeEvent');

Route::get('organization/event', 'OrganizationController@event');
Route::get('organization/event/{slug}', 'OrganizationController@searchEvent');

//Alfikri
//Guest
Route::get('/kontak', function(){
	return view('guest.kontak');
});
//user
Route::get('/register_organization', function(){
	return view('user.register_organization');
});
Route::get('/register_organization_message', function(){
	return view('user.register_organization_message');
});
//superadmin
Route::get('/superadminrambo', function(){
	return view('superAdmin.login');
});
Route::get('/superadmin/home', function(){
	return view('superAdmin.home');
});

// Admin
// Route::get('root', 'AdminController@index');
// Route::get('root/user-management','AdminController@indexUser');
// Route::get('root/user-management/blocked','AdminController@indexDeletedUser');
// Route::post('root/user-management/delete/{id}','AdminController@deleteUser');
// Route::post('root/user-management/destroy/{id}','AdminController@destroyUser');
// Route::post('root/user-management/restore/{id}','AdminController@restoreUser');
// Route::post('root/user-management/update/{id}','AdminController@updateUser');
// Route::post('root/user-management/reset-password/{id}','AdminController@resetPasswordUser');
