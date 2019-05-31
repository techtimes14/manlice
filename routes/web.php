<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::any('/', 'AuthController@index')->name('login');
	Route::group(['middleware' => 'guest:admin'], function () {

		Route::any('/logout', 'AuthController@logout')->name('logout');
		Route::get('/dashboard', 'AccountController@dashboard')->name('dashboard');
		Route::any('/settings', 'AccountController@settings')->name('settings');
        Route::any('/search-keyword', 'AccountController@searchKeyword')->name('searchKeyword');
        Route::get('/search-key-delete/{id}', 'AccountController@searchKeyDelete')->name('searchKeyDelete');

		Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
			Route::any('/', 'UsersController@list')->name('list');
			Route::any('/add', 'UsersController@add')->name('add');
			Route::any('/edit/{id}', 'UsersController@edit')->name('edit');
			Route::any('/view/{id}', 'UsersController@view')->name('view');
			Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
			Route::get('/status/{id}/{status}', 'UsersController@status')->name('status');
			Route::any('/change-password', 'UsersController@changePassword')->name('changePassword');
		});

		Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
			Route::any('/', 'CmsController@list')->name('list');
			Route::any('/add', 'CmsController@add')->name('add');
			Route::any('/edit/{id}', 'CmsController@edit')->name('edit');
			Route::get('/delete/{id}', 'CmsController@delete')->name('delete');
			Route::get('/status/{id}/{status}', 'CmsController@status')->name('status');
		});

		Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
			Route::any('/', 'ProductController@list')->name('list');
			Route::any('/add', 'ProductController@add')->name('add');
			Route::any('/edit/{id}', 'ProductController@edit')->name('edit');
			Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
			Route::get('/status/{id}/{status}', 'ProductController@status')->name('status');
			Route::any('/ajaxCheckProductTitle', 'ProductController@ajaxCheckProductTitle')->name('ajaxCheckProductTitle');
			Route::any('/make_default_image', 'ProductController@make_default_image')->name('make_default_image');
			Route::any('/delete_product_image/{id}/{product_id}', 'ProductController@delete_product_image')->name('delete_product_image');
			Route::any('/delete_product_attribute', 'ProductController@delete_product_attribute')->name('delete_product_attribute');
			Route::any('/change_status_product_attribute', 'ProductController@change_status_product_attribute')->name('change_status_product_attribute');
			Route::any('/multifileupload/{id}', 'ProductController@multifileupload')->name('multifileupload');
			Route::any('/store/{id}', 'ProductController@store')->name('store');
			Route::any('/image_delete','ProductController@image_delete')->name('image_delete');
			Route::any('/upload_product', 'ProductController@upload_product')->name('upload_product');
			Route::any('/download_template', 'ProductController@download_template')->name('download_template');
		});

		Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function () {
			Route::any('/', 'TestimonialController@list')->name('list');
			Route::any('/add', 'TestimonialController@add')->name('add');
			Route::any('/edit/{id}', 'TestimonialController@edit')->name('edit');
			Route::get('/delete/{id}', 'TestimonialController@delete')->name('delete');
			Route::get('/status/{id}/{status}', 'TestimonialController@status')->name('status');
		});

		Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
			Route::any('/', 'OrdersController@list')->name('list');
			Route::any('/view/{id}', 'OrdersController@view')->name('view');
			Route::any('/add', 'OrdersController@add')->name('add');
			Route::any('/edit/{id}', 'OrdersController@edit')->name('edit');
			Route::get('/delete/{id}', 'OrdersController@delete')->name('delete');
			Route::get('/status/{id}/{status}', 'OrdersController@status')->name('status');

			Route::any('/generate-invoice/{id}','OrdersController@generateInvoice')->name('generate-invoice');

			Route::any('/add-pincode-to-session', 'OrdersController@addPincodeToSession')->name('add-pincode-to-session');
			Route::any('/remove-pincode-from-session', 'OrdersController@removePincodeFromSession')->name('remove-pincode-from-session');

			Route::any('/add-product-section', 'OrdersController@addProductSection')->name('add-product-section');
			Route::any('/check-pincode', 'OrdersController@checkPincode')->name('check-pincode');
			Route::any('/product-attribute-extraaddon-giftaddon', 'OrdersController@productAttributeExtraaddonGiftaddon')->name('product-attribute-extraaddon-giftaddon');
			
			Route::any('/delivery-method','OrdersController@deliveryMethod')->name('delivery-method');
			Route::any('/delivery-time-slot', 'OrdersController@deliveryTimeSlot')->name('delivery-time-slot');

			Route::any('/order-assign-to-agent', 'OrdersController@order_assign_to_agent')->name('order-assign-to-agent');
			Route::any('/assigned-order-list', 'OrdersController@assigned_order_list')->name('assigned-order-list');
			Route::any('/assign-order-details/{id}', 'OrdersController@assign_order_details')->name('assign-order-details');
		});

	});
});


Route::group(['namespace' => 'Site', 'as' => 'site.'], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/set-currency', 'HomeController@set_currency')->name('set_currency');

	//Reset Password Section
	Route::any('/reset', 'ResetPasswordController@reset')->name('reset');
	Route::any('/sendResetLinkEmail', 'ForgotPasswordController@sendResetLinkEmail')->name('forgot');
	Route::any('/showResetForm/{token}', 'ResetPasswordController@showResetForm')->name('showResetForm');

	//Same Day delivery Section//
	Route::any('/same-day-delivery', 'ProductController@sameDayDelivery')->name('same-day-delivery');
	Route::any('/loadMoreSameDayDelivery', 'ProductController@loadMoreSameDayDelivery')->name('loadMoreSameDayDelivery');

	//Mid-night delivery Section//
	Route::any('/midnight-delivery', 'ProductController@midnightDelivery')->name('midnight-delivery');
	Route::any('/loadMoreMidnightDelivery', 'ProductController@loadMoreMidnightDelivery')->name('loadMoreMidnightDelivery');

    //delivery location Section//
	Route::any('/delivery-locations', 'HomeController@deliveryLocations')->name('delivery-locations');

	//Contact Us Section
	Route::any('/contact-us', 'ContactsController@index')->name('contact-us');
	Route::any('/contact-ticket/{id}', 'ContactsController@contactTicket')->name('contact-ticket');
	Route::any('/view-ticket-details', 'ContactsController@viewTicketDetails')->name('view-ticket-details');
	Route::any('/contact-status', 'ContactsController@contactStatus')->name('contact-status');

	//Reset Password
	Route::any('/resetPassword', 'ResetPasswordController@resetPassword')->name('resetPassword');

	//Facebook Registration
	Route::any('fbregister','SocialAuthFacebookController@fbregister')->name('fbregister');

	//Gmail Registration
	Route::any('gmailregister','SocialAuthFacebookController@gmailregister')->name('gmailregister');

	Route::any('/attribute-details', 'ProductController@getAttributeDetails')->name('attribute-details');

	//Add to cart functionality
	Route::get('/cart', 'CartController@index')->name('cart');
	Route::any('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
	Route::any('/remove-item/{id}', 'CartController@ajxRemoveItem')->name('remove-item');
	Route::any('/update-item', 'CartController@ajxUpdateCart')->name('update-item');
	Route::any('/delivery-method','CartController@deliveryMethod')->name('delivery-method');
	Route::any('/delivery-time-slot','CartController@deliveryTimeSlot')->name('delivery-time-slot');
	Route::any('/remove-session-pincode','ProductController@removeSessionPincode')->name('remove-session-pincode');

	//Coupon section
	Route::any('/apply-coupon', 'CartController@ajxApplyCoupon')->name('apply-coupon');
	Route::any('/coupon', 'CartController@ApplyCoupon')->name('coupon');
	Route::any('/remove-applied-coupon/{id}/{orderid}', 'CartController@removeAppliedCoupon')->name('remove-applied-coupon');

	//Gift Addon & Add to cart
	Route::any('/gift-addon', 'ProductController@getGiftAddon')->name('gift-addon');
	Route::any('/gift-addon-add-to-cart', 'CartController@giftAddonAddToCart')->name('gift-addon-add-to-cart');

	/*Get home page timer count */
	Route::get('/times-of-day', 'Controller@TimesOfDay')->name('times-of-day');

	/* User */
	Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
		Route::any('/list', 'UsersController@list')->name('list');

		Route::any('/register', 'UsersController@register')->name('register');
		Route::get('/verifyemail/{token}', 'UsersController@verify');
		Route::any('/login', 'UsersController@login')->name('login');

		//Login during CHECKOUT
		Route::any('/checkout-login-process', 'UsersController@checkoutLoginProcess')->name('checkout-login-process');

		//Guest login/register during CHECKOUT
		Route::any('/checkout-guest-login-process', 'UsersController@checkoutGuestLoginProcess')->name('checkout-guest-login-process');

		Route::any('/checkout-guest-login-gmail-process', 'UsersController@checkoutGuestLoginGmailProcess')->name('checkout-guest-login-gmail-process');

		//Authenticated pages
		Route::group(['middleware' => 'guest:web'], function () {
                Route::any('/dashboard', 'UsersController@dashboard')->name('dashboard');
                Route::any('/edit-personal-information', 'UsersController@editPersonalInformation')->name('editPersonalInformation');
                Route::any('/change-password', 'UsersController@changePassword')->name('changePassword');

                Route::any('/my-orders', 'UsersController@myOrders')->name('my-orders');

                Route::any('/my-addresses', 'UsersController@myAddresses')->name('myAddresses');
                Route::any('/add-address', 'UsersController@addAddress')->name('add-address');
                Route::any('/edit-address/{id}', 'UsersController@editAddress')->name('edit-address');
                Route::any('/delete-address', 'UsersController@deleteAddress')->name('delete-address');
                Route::any('/get-address', 'UsersController@getAddress')->name('get-address');
                Route::any('/session-pincode-get-address', 'UsersController@sessionPincodeGetAddress')->name('session-pincode-get-address');
                Route::any('/my-billing-address', 'UsersController@myBillingAddress')->name('my-billing-address');
                Route::any('/add-billing-address', 'UsersController@addBillingAddress')->name('add-billing-address');
                Route::any('/edit-billing-address/{id}', 'UsersController@editBillingAddress')->name('edit-billing-address');

                Route::any('/generate-invoice/{id}','UsersController@generateInvoice')->name('generate-invoice');

								Route::any('/my-wishlist', 'WishlistController@my_wishlist')->name('my_wishlist');

                Route::any('/logout', 'UsersController@logout')->name('logout');
		});
	});
	/* User */

	/* Checkout */
	Route::any('/cart-checkout', 'CheckoutController@cartCheckout')->name('cart-checkout');
	Route::any('/checkout', 'CheckoutController@checkoutProcess')->name('checkout-process');

	Route::group(['middleware' => 'guest:web'], function () {
		Route::any('/checkout-step-delivery-address', 'CheckoutController@checkoutStepDeliveryAddress')->name('checkout-step-delivery-address');

		Route::any('/add-new-delivery-address', 'CheckoutController@addNewDeliveryAddress')->name('add-new-delivery-address');
		Route::any('/delivery-address-update-cart', 'CheckoutController@deliveryAddressUpdateCart')->name('delivery-address-update-cart');

		Route::any('/checkout-step-billing-address', 'CheckoutController@checkoutStepBillingAddress')->name('checkout-step-billing-address');
		Route::any('/add-update-billing-address', 'CheckoutController@addUpdateBillingAddress')->name('add-update-billing-address');
		Route::any('/update-billing-address-id-cart', 'CheckoutController@updateBillingAddressIdCart')->name('update-billing-address-id-cart');

		Route::any('/checkout-step-existing-message', 'CheckoutController@checkoutStepExistingMessage')->name('checkout-step-existing-message');
		Route::any('/add-update-message', 'CheckoutController@addUpdateMessage')->name('add-update-message');
		Route::any('/checkout-step-order-summary', 'CheckoutController@checkoutStepOrderSummary')->name('checkout-step-order-summary');

		Route::any('/order-placed', 'CheckoutController@orderPlaced')->name('order-placed');
		Route::any('/thank-you/{id?}', 'CheckoutController@thankYou')->name('thank-you');
		Route::any('/payment-cancelled', 'CheckoutController@paymentCancelled')->name('payment_cancelled');
		Route::any('/payment-error', 'CheckoutController@paymentError')->name('payment-error');

	});
	/* Checkout */

    Route::any('/newsletter', 'NewsletterController@index')->name('newsletter');

	Route::get('/search', 'ProductController@search');
	Route::any('/loadMoreSearch', 'ProductController@loadMoreSearch')->name('loadMoreSearch');

	//Category and Product Section//
	Route::any('/check-pincode', 'ProductController@check_pincode')->name('check_pincode');

	Route::any('/loadMore', 'CategoryController@loadMore')->name('loadMore');

	//For CMS pages Only//
	Route::any('/terms-and-conditions', 'HomeController@termsAndConditions')->name('terms-and-conditions');
	Route::any('/about-us', 'HomeController@aboutUs')->name('about-us');
	Route::any('/contact-us', 'ContactsController@index')->name('contact-us');
	Route::any('/career', 'HomeController@career')->name('career');
	Route::any('/delivery-locations', 'HomeController@deliveryLocations')->name('delivery-locations');
	Route::any('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy-policy');
	Route::any('/substitution-policy', 'HomeController@substitutionPolicy')->name('substitution-policy');
	Route::any('/refund-policy', 'HomeController@refundPolicy')->name('refund-policy');
	Route::any('/cancellation-policy', 'HomeController@cancellationPolicy')->name('cancellation-policy');
	Route::any('/online-flower-delivery-in-india', 'HomeController@onlineFlowerDelivery')->name('online-flower-delivery-in-india');


	/********* Wishlist ***********/
	Route::any('/wishlist', 'WishlistController@wishlist')->name('wishlist');


	Route::get('subscribe-process', [
	    'as' => 'subscribe-process',
	    'uses' => 'HomeController@SubscribProcess'
	]);

	Route::get('subscribe-cancel', [
	    'as' => 'subscribe-cancel',
	    'uses' => 'HomeController@SubscribeCancel'
	]);

	Route::any('/subscribe-response','HomeController@SubscribeResponse')->name('subscribe-response');

	/********* Note : Please add routes above this line. Below route must always be at the last of every routes. *********/

	//Route::get('/{query}', 'CheckController@index')->where('query','.+');
});
