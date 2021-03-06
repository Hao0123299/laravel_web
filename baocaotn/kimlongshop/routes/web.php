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
//Frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::get('/404','HomeController@error_page');
Route::post('/tim-kiem','HomeController@search');
Route::post('/timkiem','HomeController@timkiem');



//contact
Route::get('/lien-he','ContactController@lien_he');
Route::get('/contact-admin','ContactController@contact_admin');
Route::post('/contact-save','ContactController@contact_save');
Route::post('/update-save/{contact_id}', 'ContactController@update_save'); /* update dựa trên contact id*/
//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet/{product_slug}','ProductController@details_product');
Route::post('/comment-load','ProductController@comment_load');
//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard')/*->middleware('roles')*/;
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product-parent','CategoryProduct@add_category_product_parent');/*danh mục cha*/
Route::get('/add-category-product','CategoryProduct@add_category_product'); /*danh mục con*/
Route::post('/save-category-product-parent','CategoryProduct@save_category_product_parent');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
/* Mail*/
Route::get('/gmail','MailController@gmail');/*gửi mail*/
Route::get('/gmail-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@gmail_coupon');/*gửi mã khuyến mãi*/
Route::get('/coupon-gmail','MailController@coupon_gmail');/*trả về trang gửi email*/
Route::get('/forgot-password','MailController@forgot_password'); /*login_checkout.blade.php*/
Route::post('/address-email','MailController@address_email');/*nhập địa chỉ email để nhận mail khôi phục mật khẩu*/
Route::get('/update-password','MailController@update_password');/*nhập mật khẩu mới*/
Route::post('/new-password-customer','MailController@new_password_customer');/*cập nhật mật khẩu mới*/
//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::post('/comment','ProductController@comment');
Route::post('/insert-rate','ProductController@insert_rate');

Route::post('/uploads-ckeditor','ProductController@ckeditor_image');
/*Route::get('/file-browser','ProductController@file_browser');*/
//Coupon
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/edit-coupon/{coupon_id}','CouponController@edit_coupon');
Route::post('/update-coupon/{coupon_id}','CouponController@update_coupon');
//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');
Route::get('/show-infor-cart','CartController@show_infor_cart');
Route::get('/hover-infor-cart','CartController@hover_infor_cart');


//Checkout
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');

Route::get('/checkout','CheckoutController@checkout')->name('checkout');
//Login facebook
Route::get('/login-facebook','CheckoutController@login_facebook');
Route::get('/facebook/callback','CheckoutController@callback_facebook');
//Login google
Route::get('/login-google','CheckoutController@login_google');
Route::get('/google/callback','CheckoutController@callback_google');

//Order
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
Route::get('/order-history','OrderController@order_history');
Route::get('/view-order-history/{order_code}','OrderController@view_order_history');
Route::post('/cancel-order','OrderController@cancel_order');

//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');
//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');
//picture
Route::get('/add-picture/{product_id}','PictureController@add_picture');
Route::post('/insert-picture','PictureController@insert_picture');
Route::post('/insert-picture-information/{pro}','PictureController@insert_picture_information');
Route::post('/update-name-picture','PictureController@update_name_picture');
Route::post('/delete-picture','PictureController@delete_picture');
Route::post('/update-picture','PictureController@update_picture');
//comment
Route::get('/comment','CommentController@comment');
Route::post('/comment-allow','CommentController@comment_allow');
Route::post('/comment-reply','CommentController@comment_reply');
Route::get('/delete-comment/{comment_id}','CommentController@delete_comment');
//thống kê
Route::post('/statistics-date','StatisticalController@statistics_date');
Route::post('/filter-by-time','StatisticalController@filter_by_time');
Route::post('/statistics-oder','StatisticalController@statistics_oder');

//thanh toán online paypal
Route::get('create-transaction', 'PayPalController@createTransaction')->name('createTransaction');
Route::get('process-transaction', 'PaypalController@processTransaction')->name('processTransaction');
Route::get('success-transaction', 'PaypalController@successTransaction')->name('successTransaction');
Route::get('cancel-transaction', 'PaypalController@cancelTransaction')->name('cancelTransaction');

//phân quyền
Route::get('/register-account-staff','AdminController@register_account_staff');
Route::get('/login-account-staff','AdminController@login_account_staff');
Route::post('/register-staff','AdminController@register_staff');
Route::post('/login-staff','AdminController@login_staff');
Route::get('/logout-staff','AdminController@logout_staff');

Route::get('users','UserController@index')->middleware('roles');
Route::get('add-staff','UserController@add_staff')->middleware('roles');
Route::get('delete-staff/{admin_id}','UserController@delete_staff')->middleware('roles');
Route::post('add-user','UserController@add_user')->middleware('roles');
Route::post('staff-roles','UserController@staff_roles')->middleware('roles');
Route::get('/forgot-password-staff','UserController@forgot_password_staff');
Route::post('/address-email-staff','UserController@address_email_staff');/*nhập địa chỉ email để nhận mail khôi phục mật khẩu*/
Route::get('/update-password-staff','UserController@update_password_staff');/*nhập mật khẩu mới*/
Route::post('/password-new-staff','UserController@password_new_staff');/*cập nhật mật khẩu mới*/



















