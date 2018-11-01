<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('confirmation/{token}','GuestController@confirmation');

Route::get('home', 'HomeController@index');

Route::get('job','DesignerController@indexJob');
Route::get('job/on-progress','DesignerController@indexJobProgress');

Route::get('order/spanduk', 'OrderController@orderSpanduk');
Route::post('order/spanduk/store', 'OrderController@storeSpanduk');

Route::get('order/poster', 'OrderController@orderPoster');
Route::get('order/banner', 'OrderController@orderBanner');
Route::get('order/pamflet', 'OrderController@orderPamflet');
Route::get('order/id-card', 'OrderController@orderIdCard');
Route::get('order/logo', 'OrderController@orderLogo');
Route::get('order/cv', 'OrderController@orderCv');
Route::get('order/book-cover', 'OrderController@orderBookCover');

Route::get('order/destroy/{token}','OrderController@destroyOrder');

// ------------- ADMIN ROUTE ----------------//
Route::get('root', 'AdminController@index');
Route::get('root/user-management','AdminController@indexUser');
Route::get('root/user-management/blocked','AdminController@indexDeletedUser');
Route::post('root/user-management/delete/{id}','AdminController@deleteUser');
Route::post('root/user-management/destroy/{id}','AdminController@destroyUser');
Route::post('root/user-management/restore/{id}','AdminController@restoreUser');
Route::post('root/user-management/update/{id}','AdminController@updateUser');
Route::post('root/user-management/reset-password/{id}','AdminController@resetPasswordUser');

Route::post('root/discount-management/store','AdminController@storeDiscount');
Route::get('root/discount-management','AdminController@indexDiscount');
// ------------- END OF ADMIN ROUTE ----------------//

// Route::get('tes',function ()
// {
//   return view('mail/confirmation');
// });
