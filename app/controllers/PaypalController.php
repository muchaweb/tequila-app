<?php

class PaypalController extends \BaseController {
	public function __construct()
	{
	    $this->beforeFilter('csrf', array('on' => 'post'));
	    $this->beforeFilter('auth', array('only' => array('/admin')));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * GET /paypal/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paypal = Paypal::find($id);

		return View::make('admin.paypal.paypal-edit')
					->with('paypal', $paypal);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /paypal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Paypal::$rules, Paypal::$messages);

		if($validator->passes()) {
		    $paypal 				=	Paypal::find($id);

		    $paypal->cancel_url     =	Input::get('cancel_url');
		    $paypal->success_url	=	Input::get('success_url');
		    $paypal->username 		=	Input::get('username');
		    $paypal->password 		=	Input::get('password');
		    $paypal->signature		=	Input::get('signature');

		    $paypal->save();

		    return Redirect::to('/admin/paypal/edit/'.$id)
		    		->with('success', 'PayPal configurado correctamente');

		} else {
			
		    return Redirect::to('/admin/paypal/edit/'.$id)
		    				->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
		}
	}

	public function activeSandbox()
	{
	    $id 	 = 	Input::get('id');
	    $sandbox = 	Paypal::findOrFail($id);

	    if($sandbox != "") {
	        $sandbox->sandbox = $sandbox->sandbox ? false : true;
	        $sandbox->save();
	    }

	    return Redirect::to('/admin/paypal/edit/'.$id);
	}

}