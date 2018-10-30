<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('confirmation/{token}','GuestController@confirmation');

Route::get('home', 'HomeController@index');
Route::get('order/spanduk', 'UserController@orderSpanduk');
Route::post('order/spanduk/store', 'OrderController@storeSpanduk');

Route::get('order/poster', 'UserController@orderPoster');
Route::get('order/banner', 'UserController@orderBanner');
Route::get('order/pamflet', 'UserController@orderPamflet');
Route::get('order/id-card', 'UserController@orderIdCard');
Route::get('order/logo', 'UserController@orderLogo');
Route::get('order/cv', 'UserController@orderCv');
Route::get('order/book-cover', 'UserController@orderBookCover');

// ------------- ADMIN ROUTE ----------------//
Route::get('root', 'AdminController@index');
Route::get('root/user-management','AdminController@indexUser');
Route::get('root/user-management/blocked','AdminController@indexDeletedUser');
Route::post('root/user-management/delete/{id}','AdminController@deleteUser');
Route::post('root/user-management/destroy/{id}','AdminController@destroyUser');
Route::post('root/user-management/restore/{id}','AdminController@restoreUser');
Route::post('root/user-management/update/{id}','AdminController@updateUser');
Route::post('root/user-management/reset-password/{id}','AdminController@resetPasswordUser');

Route::get('root/order-type','AdminController@indexOrderType');
Route::get('root/order-type/update','AdminController@indexUpdateOrderType');
Route::post('root/order-type/create/store','AdminController@storeCreateOrderType');
Route::post('root/order-type/term/create/store/{id}','AdminController@storeTerm');
Route::post('root/order-type/update/{id}','AdminController@storeOrderType');
Route::post('root/order-type/term/update/store/{id}','AdminController@storeUpdateTerm');
// ------------- END OF ADMIN ROUTE ----------------//
