<?php
Auth::routes();
Route::get('/logout', 'Auth\LogoutController@index')->name('logout');

// csrfError
Route::get('/csrf-error', function() {
    return "Oops! Seems you couldn't submit form for a long time. Please try again.";
})->name('csrfError');

// multi-langs
Route::post('/admin/language', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index'
));
/* Admin *************************************************************************** */
Route::prefix('admin')->group( function() {
    Route::get('/', function() {
        return redirect()->guest( route('admin.dashboard'));
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permissionAdmin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');
    Route::resource('/user', 'UserController');
    Route::resource('/supplier', 'SupplierController');
    Route::resource('/order', 'OrderController');
    Route::resource('/contact', 'ContactController');
    Route::resource('/subscribe', 'SubscribeController');
    Route::resource('/setting', 'SettingController');

    /* route 404 for admin */
    Route::get('/404', 'DashboardController@admin404')->name('admin404');
});

/* API *************************************************************************** */
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function()
{
    // api
    Route::post('/update-status-category', 'ApiController@updateStatusCategory')->middleware('auth');
    Route::post('/update-status-user', 'ApiController@updateStatusUser')->middleware('auth');
    Route::post('/update-status-supplier', 'ApiController@updateStatusSupplier')->middleware('auth');
    Route::post('/update-status-product', 'ApiController@updateStatusProduct')->middleware('auth');
    Route::post('/update-status-order', 'ApiController@updateStatusOrder')->middleware('auth');
    Route::post('/update-status-subscribe', 'ApiController@updateStatusSubscribe')->middleware('auth');
    Route::post('/update-status-contact', 'ApiController@updateStatusContact')->middleware('auth');

    Route::post('/update-password', 'ApiController@updatePassword')->middleware('auth');
    Route::post('/upload-picture', 'ApiController@updatePicture')->middleware('auth');

    // ajax
    Route::post('/ajax/edit-inline', 'AjaxController@editInline')->middleware('auth');
    Route::post('/ajax/update_order_note', 'AjaxController@updateOrderNote');

});

/* Website *************************************************************************** */
Route::post('/add-to-cart', 'Api\AjaxController@addToCart');
Route::post('/delete-cart', 'Api\AjaxController@deleteCart');
Route::post('/ajax/subscribe', 'Api\AjaxController@subscribe');
Route::post('/ajax/get-districts', 'Api\AjaxController@getDistricts');
Route::post('/ajax/get-supplier', 'Api\AjaxController@getSupplier');
Route::post('/ajax/get-order-detail', 'Api\AjaxController@getOrderDetail');

Route::group(['namespace' => 'Website', 'prefix' => ''], function() {

    Route::get('/', 'HomeController@index');
    Route::get('/about', 'AboutController@index');
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@store');
    Route::get('/my-account', 'MyAccountController@index')->middleware('auth');
    Route::get('/my-account/password', 'MyAccountController@password')->middleware('auth');
    Route::get('/my-account/orders', 'MyAccountController@orders')->middleware('auth');
    Route::post('/update-user-setting', 'MyAccountController@updateSetting')->middleware('auth');
    Route::post('/update-password', 'MyAccountController@updatePassword')->middleware('auth');
    Route::post('/cancel-order', 'MyAccountController@cancelOrder')->middleware('auth');
    Route::get('/cart', 'CartController@index');
    Route::get('/checkout', 'CheckOutController@index')->middleware('auth');
    Route::get('/checkout-success', 'CheckOutController@checkoutSuccess')->middleware('auth');
    Route::post('/checkout/checkout', 'CheckOutController@checkout');
    /* route 404 for website */
    Route::get('/404', 'HomeController@website404')->name('website404');
    /* route product */
    Route::get('/search', 'ProductController@search');
    Route::get('/category', 'CategoryController@index');
    Route::get('/{category_slug}', 'ProductController@index')->middleware('notPageAdmin');
    Route::get('/{category_slug}/{product_slug}', 'ProductController@productDetail')->middleware('notPageAdmin');

});




