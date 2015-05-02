<?php
Route::get('/', function() {
  return Redirect::to('/admin');
});

//-- Confirmation code 
Route::get('/register/verify/{confirmation_code}', array('as' => 'confirmation_path', 'uses' => 'VerifyRegisterController@confirmCode'));

//-- Admin
Route::group(array('prefix' => 'admin'),function() {

    //-- Login
    Route::get('/',  array('as' => 'login_form', 'uses' => 'UserController@getLogin'));
      
    Route::post('/', array('as' => 'login_process','uses' => 'UserController@postLogin'));

        //-- Users
    Route::group(array('prefix' => 'users','before' => 'auth'),function(){

        Route::get('/',  array('as' => 'user_list', 'uses' => 'UserController@index'));
        
        Route::post('/', array('uses' => 'UserController@getActive'))->before('csrf');

        Route::post('/delete/{id}', array('as' => 'user_delete','uses' => 'UserController@destroy'));

        Route::get('/add', array('as' => 'user_add_new_form','uses' => 'UserController@create'));

        Route::post('/add', array('as' => 'user_add_new_process','uses' => 'UserController@store'));

        Route::get('/edit/{id}', array('as' => 'user_edit_form','uses' => 'UserController@edit'));

        Route::post('/edit/{id}', array('as' => 'user_edit_process','uses' => 'UserController@update'));

        Route::get('/reset-password/{id}', array('as' => 'user_reset_password_form','uses' => 'UserController@getResetPassword'));

        Route::post('/reset-password/{id}', array('as' => 'user_reset_password_process', 'uses' => 'UserController@postResetPassword'));

    }); 
    //-- End users

    //-- Customers
    Route::group(array('prefix' => 'customers','before' => 'auth'),function() {

        Route::get('/',  array('as' => 'customer_list','uses' => 'CustomerController@index'));

        Route::post('/delete/{id}', array('as' => 'customer_delete','uses' => 'CustomerController@destroy'));
   
    }); 
    //--End customers

    //-- Shipping methods
    Route::group(array('prefix' => 'shipping_methods','before' => 'auth'),function(){

      Route::get('/',  array('as' => 'shipping_method_list','uses' => 'ShippingMethodController@index'));

      Route::post('/', array('uses' => 'ShippingMethodController@getActive'))->before('csrf');

      Route::post('/delete/{id}', array('as' => 'shipping_method_delete','uses' => 'ShippingMethodController@destroy'));

      Route::get('/add', array('as' => 'shipping_method_add_new_form','uses' => 'ShippingMethodController@create'));

      Route::post('/add', array('as' => 'shipping_method_add_new_process', 'uses' => 'ShippingMethodController@store'));

      Route::get('/edit/{id}', array('as' => 'shipping_method_edit_form', 'uses' => 'ShippingMethodController@edit'));

      Route::post('/edit/{id}', array('as' => 'shipping_method_edit_process', 'uses' => 'ShippingMethodController@update'));

    }); 
    //-- End shipping methods

    //-- Payment methods
    Route::group(array('prefix' => 'payment_methods','before' => 'auth'),function() {

      Route::get('/',  array('as' => 'payment_method_list','uses' => 'PaymentMethodController@index'));

      Route::post('/', array('uses' => 'PaymentMethodController@getActive'))->before('csrf');

      Route::post('/delete/{id}', array('as' => 'payment_method_delete','uses' => 'PaymentMethodController@destroy'));

      Route::get('/add', array('as' => 'payment_method_add_new_form', 'uses' => 'PaymentMethodController@create'));

      Route::post('/add', array('as' => 'payment_method_add_new_process','uses' => 'PaymentMethodController@store'));

      Route::get('/edit/{id}', array('as' => 'payment_method_edit_form', 'uses' => 'PaymentMethodController@edit'));

      Route::post('/edit/{id}', array('as' => 'payment_method_edit_process','uses' => 'PaymentMethodController@update'));

    }); 
    //-- End payment methods

    //-- Events
    Route::group(array('prefix' => 'events','before' => 'auth'),function() {

      Route::get('/',  array('as' => 'event_list', 'uses' => 'EventController@index'));

      Route::post('/', array('uses' => 'EventController@getActive'))->before('csrf');

      Route::post('/delete/{id}', array('as' => 'event_delete','uses' => 'EventController@destroy'));

      Route::get('/add', array('as' => 'event_add_new_form','uses' => 'EventController@create'));

      Route::post('/add', array('as' => 'event_add_new_process','uses' => 'EventController@store'));

      Route::get('/edit/{id}', array('as' => 'event_edit_form','uses' => 'EventController@edit'));

      Route::post('/edit/{id}', array('as' => 'event_edit_process','uses' => 'EventController@update'));
    }); 
    //--End events
    
    //-- PayPal
    Route::group(array('prefix' => 'paypal','before' => 'auth'),function() {

      Route::get('/edit/{id}',  array('as' => 'paypal_edit','uses' => 'PaypalController@edit'));
      
      Route::post('/edit/{id}', array('uses' => 'PaypalController@activeSandbox'))->before('csrf');

    }); 
    //-- End PayPal
    
    //-- Products
    Route::group(array('prefix' => 'products','before' => 'auth'),function() {

      Route::get('/',  array('as' => 'product_list', 'uses' => 'ProductController@index'));

      Route::post('/', array('uses' => 'ProductController@getActive'))->before('csrf');

      Route::post('/delete/{id}', array('as' => 'product_delete','uses' => 'ProductController@destroy'));

      Route::get('/add', array('as' => 'product_add_new_form','uses' => 'ProductController@create'));

      Route::post('/add', array('as' => 'product_add_new_process','uses' => 'ProductController@store'));

      Route::get('/edit/{id}', array('as' => 'product_edit_form','uses' => 'ProductController@edit'));

      Route::post('/edit/{id}', array('as' => 'product_edit_process','uses' => 'ProductController@update'));

    }); 
    //--End products
});
