<?php

Route::get('/', 'GuestController@index');

Auth::routes();
Route::get('home', 'HomeController@index');
Route::get('home/history', 'DesignerController@indexHistory');
Route::get('home/change-password','HomeController@changePassword');
Route::post('home/change-password/store','HomeController@storeChangePassword');
Route::get('confirmation/{token}','GuestController@confirmation');
Route::get('confirmation/resend/email','HomeController@resendEmail');

Route::get('upload','GuestController@uploadDesign');

Route::get('theme','ThemeController@index');
Route::get('theme/{id}','ThemeController@show');

Route::get('design','ThemeController@indexDesign');
Route::get('search','ThemeController@search');

Route::get('contact', function(){ return view('guest/contact'); });
Route::post('advice','GuestController@storeAdvice');

// Route::get('job','DesignerController@indexJob');
// Route::get('job/on-progress','DesignerController@indexJobProgress');
// Route::get('job/revision','DesignerController@indexJobRevision');
// Route::get('job/closed','DesignerController@indexJobClosed');
// Route::get('job/take/{id}','DesignerController@takeJob');

// Route::get('order/spanduk', 'OrderController@orderSpanduk');
// Route::post('order/spanduk/store', 'OrderController@storeSpanduk');
//
// Route::get('order/poster', 'OrderController@orderPoster');
// Route::post('order/poster/store', 'OrderController@storePoster');
//
// Route::get('order/banner', 'OrderController@orderBanner');
// Route::post('order/banner/store', 'OrderController@storeBanner');
//
// Route::get('order/pamflet', 'OrderController@orderPamflet');
// Route::post('order/pamflet/store', 'OrderController@storePamflet');
//
// Route::get('order/id-card', 'OrderController@orderIdCard');
// Route::post('order/id-card/store', 'OrderController@storeIdCard');
//
// Route::get('order/book-cover', 'OrderController@orderBookCover');
// Route::post('order/book-cover/store', 'OrderController@storeBookCover');

// // beda field
// Route::get('order/logo', 'OrderController@orderLogo');
// Route::post('order/logo/store', 'OrderController@storeLogo');
//
Route::get('order/cv/{id}', 'OrderController@orderCv');
Route::post('order/cv@store', 'OrderController@storeCv');
Route::get('success', 'OrderController@success');
//
// Route::get('order/calender', 'OrderController@orderCalender');
// Route::post('order/calender/store', 'OrderController@storeCalender');
//
// Route::get('order/maskot', 'OrderController@orderMaskot');
// Route::post('order/maskot/store', 'OrderController@storeMaskot');
//
// Route::get('order/vector', 'OrderController@orderVector');
// Route::post('order/vector/store', 'OrderController@storeVector');
// // end beda field

Route::get('order/destroy/{token}','OrderController@destroyOrder');

Route::get('shop','GuestController@indexShop');
Route::get('shop/{id}','GuestController@showShop');
Route::post('shop/{id}/store','GuestController@storeShop');
Route::get('shop/{id}/payment','GuestController@paymentShop');
Route::get('shop/category/{category}', 'GuestController@categoryShop');
Route::get('shop/search/product', 'GuestController@searchShop');
Route::get('shop/search/filter','GuestController@searchFilter');

// ------------- ADMIN ROUTE ----------------//
Route::get('root', 'AdminController@index');
Route::get('root/user-management','AdminController@indexUser');
Route::get('root/user-management/blocked','AdminController@indexDeletedUser');
Route::post('root/user-management/delete/{id}','AdminController@deleteUser');
Route::post('root/user-management/destroy/{id}','AdminController@destroyUser');
Route::post('root/user-management/restore/{id}','AdminController@restoreUser');
Route::post('root/user-management/update/{id}','AdminController@updateUser');
Route::post('root/user-management/reset-password/{id}','AdminController@resetPasswordUser');
// Route::get('root/user-management/add-designer', function(){ return view('admin/user-management-new-designer'); });
// Route::post('root/user-management/add-designer/store', 'AdminController@registerDesigner');

// Route::post('root/discount-management/store','AdminController@storeDiscount');
// Route::get('root/discount-management','AdminController@indexDiscount');
// Route::post('root/discount-management/send','AdminController@sendDiscount');
// Route::get('root/discount-management/destroy/{id}','AdminController@destroyDiscount');
// Route::get('root/discount-management/users','AdminController@userDiscount');

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

Route::get('root/promote-email', 'AdminController@promoteEmail');
Route::get('root/promote-email/mailist', 'AdminController@mailistPromoteEmail');
Route::post('root/promote-email/store', 'AdminController@storePromoteEmail');
Route::post('root/promote-email/mailist/store/{id}', 'AdminController@storeMailistPromoteEmail');

Route::get('root/suggestion', 'AdminController@indexSuggestion');

Route::get('root/wapyshop','AdminController@indexWapyshop');
Route::post('root/wapyshop/stock/store','AdminController@storeStock');
Route::get('root/wapyshop/transaction', 'AdminController@transactionWapyshop');
Route::get('root/wapyshop/{id}/{status}', 'AdminController@changeStatusWapyshop');
// ------------- END OF ADMIN ROUTE ----------------//
