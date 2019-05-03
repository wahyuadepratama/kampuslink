<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('event', 'GuestController@indexEvent');
Route::get('event/{slug}', 'GuestController@showEvent');
Route::get('event/{campus}/{organization}/{category}', 'GuestController@filter');

Route::get('get-faculty/{id}', 'GuestController@getDataFaculty');
Route::get('get-program-study/{id}', 'GuestController@getDataProgramStudy');

Route::get('event/{slug}/process', 'TransactionController@processTransaction');
Route::post('event/{slug}/process', 'TransactionController@postProcessTransaction');
Route::post('event/search', 'GuestController@search');
Route::get('event/search/{query}', 'GuestController@indexSearch');

Route::get('/kontak', function(){	return view('guest.kontak'); });
Route::get('/register-organization','GuestController@showRegisterOrganization');
Route::post('/store-register-organization', 'GuestController@storeRegisterOrganization');

// User
Route::get('profile', 'UserController@profile');
Route::post('update-profile-user', 'UserController@updateDataProfileUser');
Route::post('update-kampus-user', 'UserController@updateDataKampusUser');
Route::post('update-login-user', 'UserController@updateDataLoginUser');

Route::get('transaction', 'TransactionController@indexTransaction');
Route::get('transaction/{id}', 'TransactionController@showTransaction');
Route::post('transaction/{id}/confirm', 'TransactionController@confirmTransaction');
Route::post('transaction/{id}/proof/upload', 'TransactionController@proofTransaction');
Route::get('get-all-sub-event', 'GuestController@getDataSubEvent');

// Organisasi
Route::get('organization/{ig}', 'OrganizationController@home');
Route::get('organization/{ig}/profile', 'OrganizationController@profile');
Route::get('organization/{ig}/fund-collected', 'OrganizationController@fundCollected');
Route::post('organization/{ig}/profile', 'OrganizationController@saveProfile');
Route::get('organization/{ig}/members', 'OrganizationController@indexMember');
Route::post('organization/{ig}/members/update-role', 'OrganizationController@updateRoleMember');

Route::get('organization/{ig}/event', 'OrganizationController@event');
Route::get('organization/{ig}/event/{slug}', 'OrganizationController@showEvent');
Route::get('organization/{ig}/big-event/{slug}', 'OrganizationController@showBigEvent');

Route::get('organization/{ig}/event/add-big-event/show', 'OrganizationController@addBigEvent');
Route::post('organization/{ig}/event/add-big-event/store', 'OrganizationController@storeBigEvent');

Route::get('organization/{ig}/event/add/show', 'OrganizationController@addEvent');
Route::post('organization/{ig}/event/add/store', 'OrganizationController@storeEvent');

// Super Admin
Route::get('admin', 'AdminController@index');

Route::get('admin/university', 'AdminController@indexCampus');
Route::post('admin/university/store', 'AdminController@storeCampus');
Route::get('admin/university/destroy/{id}', 'AdminController@destroyCampus');
Route::post('admin/university/update/{id}', 'AdminController@updateCampus');

Route::get('admin/faculty', 'AdminController@indexFaculty');
Route::post('admin/faculty/store', 'AdminController@storeFaculty');
Route::get('admin/faculty/destroy/{id}', 'AdminController@destroyFaculty');
