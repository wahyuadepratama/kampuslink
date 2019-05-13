<?php

Route::get('/', 'GuestController@index');

Auth::routes();
// Route::get('event', 'GuestController@indexEvent');
Route::get('event', function(){return view('errors/coming_soon');});
Route::get('event/{slug}', 'GuestController@showEvent');
Route::get('event/{campus}/{organization}/{category}', 'GuestController@filter');

Route::get('get-faculty/{id}', 'GuestController@getDataFaculty');
Route::get('get-program-study/{id}', 'GuestController@getDataProgramStudy');

Route::get('event/{slug}/process', 'TransactionController@processTransaction');
Route::post('event/{slug}/process', 'TransactionController@postProcessTransaction');
Route::post('event/search', 'GuestController@search');
Route::get('event/search/{query}', 'GuestController@indexSearch');

// Route::get('/kontak', function(){	return view('guest.kontak'); });
Route::get('kontak', function(){return view('errors/coming_soon');});
Route::get('/register-organization','GuestController@showRegisterOrganization');
Route::post('/store-register-organization', 'GuestController@storeRegisterOrganization');

// _____________________________ User
Route::get('profile', 'UserController@profile');
Route::post('update-profile-user', 'UserController@updateDataProfileUser');
Route::post('update-kampus-user', 'UserController@updateDataKampusUser');
Route::post('update-login-user', 'UserController@updateDataLoginUser');

Route::get('transaction', 'TransactionController@indexTransaction');
Route::get('transaction/{id}', 'TransactionController@showTransaction');
Route::post('transaction/{id}/confirm', 'TransactionController@confirmTransaction');
Route::post('transaction/{id}/proof/upload', 'TransactionController@proofTransaction');
Route::get('get-all-sub-event', 'GuestController@getDataSubEvent');

// _____________________________ Organisasi
Route::get('organization/{ig}', 'OrganizationController@home');
Route::get('organization/{ig}/profile', 'OrganizationController@profile');
Route::get('organization/{ig}/fund-collected', 'OrganizationController@fundCollected');
Route::post('organization/{ig}/profile', 'OrganizationController@saveProfile');

Route::get('organization/{ig}/members', 'OrganizationController@indexMember');
Route::post('organization/{ig}/members/update-role', 'OrganizationController@updateRoleMember');
Route::get('organization/user/{query}','OrganizationController@searchUserQuery');
Route::get('organization/{ig}/members/new/store/{username}','OrganizationController@storeNewMember');
Route::get('organization/{ig}/members/new/destroy/{username}','OrganizationController@destroyMember');

Route::get('organization/{ig}/event', 'OrganizationController@event');
Route::get('organization/{ig}/event/{slug}', 'OrganizationController@showEvent');
Route::get('organization/{ig}/big-event/{slug}', 'OrganizationController@showBigEvent');

Route::get('organization/{ig}/event/add-big-event/show', 'OrganizationController@addBigEvent');
Route::post('organization/{ig}/event/add-big-event/store', 'OrganizationController@storeBigEvent');

Route::get('organization/{ig}/event/big-event/edit/{id}', 'OrganizationController@editBigEvent');
Route::post('organization/{ig}/event/big-event/update/{id}', 'OrganizationController@updateBigEvent');

Route::get('organization/{ig}/event/add/show', 'OrganizationController@addEvent');
Route::post('organization/{ig}/event/add/store', 'OrganizationController@storeEvent');

Route::get('organization/{ig}/event/edit/{id}', 'OrganizationController@editEvent');
Route::post('organization/{ig}/event/update/{id}', 'OrganizationController@updateEvent');

// _____________________________ Super Admin
Route::get('admin', 'AdminController@index');

Route::get('admin/user', 'AdminController@indexUser');
Route::get('admin/user/approve/{id}', 'AdminController@approveUser');
Route::get('admin/user/reject/{id}', 'AdminController@rejectUser');

Route::get('admin/big-event', 'AdminController@indexBigEvent');
Route::get('admin/big-event/approve/{id}', 'AdminController@approveBigEvent');
Route::post('admin/big-event/reject/{id}', 'AdminController@rejectBigEvent');

Route::get('admin/event', 'AdminController@indexEvent');
Route::get('admin/event/approve/{id}', 'AdminController@approveEvent');
Route::post('admin/event/reject/{id}', 'AdminController@rejectEvent');

Route::get('admin/university', 'AdminController@indexCampus');
Route::post('admin/university/store', 'AdminController@storeCampus');
Route::get('admin/university/destroy/{id}', 'AdminController@destroyCampus');
Route::post('admin/university/update/{id}', 'AdminController@updateCampus');

Route::get('admin/faculty', 'AdminController@indexFaculty');
Route::post('admin/faculty/store', 'AdminController@storeFaculty');
Route::get('admin/faculty/destroy/{id}', 'AdminController@destroyFaculty');

Route::get('admin/program-study', 'AdminController@indexProgramStudy');
Route::post('admin/program-study/store', 'AdminController@storeProgramStudy');
Route::get('admin/program-study/destroy/{id}', 'AdminController@destroyProgramStudy');

Route::get('admin/organization', 'AdminController@indexOrganization');
Route::get('admin/organization/approve/{id}', 'AdminController@approveOrganization');
Route::get('admin/organization/reject/{id}', 'AdminController@rejectOrganization');
