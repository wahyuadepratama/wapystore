<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('confirmation/{token}','GuestController@confirmation');
Route::get('confirmation/resend/email','HomeController@resendEmail');

Route::get('upload','GuestController@uploadDesign');

Route::get('theme','ThemeController@index');
Route::get('theme/{id}','ThemeController@show');

Route::get('portofolio','ThemeController@indexPortofolio');
Route::get('search','ThemeController@search');

Route::get('contact', function(){ return view('guest/contact'); });
Route::post('advice','GuestController@storeAdvice');

Route::get('home', 'HomeController@index');
Route::get('home/history', 'DesignerController@indexHistory');

Route::get('job','DesignerController@indexJob');
Route::get('job/on-progress','DesignerController@indexJobProgress');
Route::get('job/revision','DesignerController@indexJobRevision');
Route::get('job/closed','DesignerController@indexJobClosed');
Route::get('job/take/{id}','DesignerController@takeJob');

Route::get('order/spanduk', 'OrderController@orderSpanduk');
Route::post('order/spanduk/store', 'OrderController@storeSpanduk');

Route::get('order/poster', 'OrderController@orderPoster');
Route::post('order/poster/store', 'OrderController@storePoster');

Route::get('order/banner', 'OrderController@orderBanner');
Route::post('order/banner/store', 'OrderController@storeBanner');

Route::get('order/pamflet', 'OrderController@orderPamflet');
Route::post('order/pamflet/store', 'OrderController@storePamflet');

Route::get('order/id-card', 'OrderController@orderIdCard');
Route::post('order/id-card/store', 'OrderController@storeIdCard');

Route::get('order/book-cover', 'OrderController@orderBookCover');
Route::post('order/book-cover/store', 'OrderController@storeBookCover');

// beda field
Route::get('order/logo', 'OrderController@orderLogo');
Route::post('order/logo/store', 'OrderController@storeLogo');

Route::get('order/cv', 'OrderController@orderCv');
Route::post('order/cv/store', 'OrderController@storeCv');
// end beda field

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
Route::post('root/discount-management/send','AdminController@sendDiscount');
Route::get('root/discount-management/destory/{id}','AdminController@destroyDiscount');
Route::get('root/discount-management/users','AdminController@userDiscount');

Route::get('root/transaction/','AdminController@waitingOrder');
Route::get('root/transaction/on-progress','AdminController@onProgressOrder');
Route::get('root/transaction/{transaction_id}/{order_id}','AdminController@confirmPayment');
Route::get('root/transaction/change/sudah/{id}','AdminController@confirmSudah');
Route::get('root/transaction/change/belum/{id}','AdminController@confirmBelum');
Route::get('root/transaction/change/status/revision/{id}','AdminController@confirmRevision');
Route::get('root/transaction/change/status/done/{id}','AdminController@confirmDone');

Route::get('root/theme','AdminController@indexTheme');
Route::post('root/theme/store', 'AdminController@storeTheme');
Route::get('root/theme/destroy/{id}', 'AdminController@destroyTheme');
Route::get('root/theme/photo', 'AdminController@indexThemePhoto');
Route::post('root/theme/photo/store', 'AdminController@storeThemePhoto');
Route::get('root/theme/photo/destroy/{id}', 'AdminController@destroyPhoto');
Route::get('/root/theme/photo-theme/destroy/{id}', 'AdminController@destroyThemePhoto');

Route::get('root/file-design', 'AdminController@redirectToFiles');
// ------------- END OF ADMIN ROUTE ----------------//
