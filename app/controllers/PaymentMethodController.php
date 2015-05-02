<?php

class PaymentMethodController extends \BaseController {

		public function __construct()
		{

		    $this->beforeFilter('csrf', array('on' => 'post'));
		    $this->beforeFilter('auth', array('only' => array('/admin')));
		}

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index()
		{
			$payment_methods = DB::table('payment_methods')
								->orderBy('payment_methods.ordering', 'desc')
	                        	->paginate(10);

			return View::make('admin.payment_methods.payment-methods')
								->with('payment_methods', $payment_methods);
		}


		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			return View::make('admin.payment_methods.payment-methods-new');
		}


		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store()
		{
			$validator_pm_form = Validator::make(Input::all(), PaymentMethod::$rules_pm_form, PaymentMethod::$messages);

			if($validator_pm_form->passes()) {		            
			    $pm                 = new PaymentMethod;

			    $pm->payment_method = Input::get('payment_method');
			    $pm->description    = Input::get('description');
			    $pm->active         = Input::get('active');

			    $pm->save();

			    return Redirect::route('payment_method_add_new_form')
			    				->with('success', 'Método de pago registrado correctamente');

			} else {

				return Redirect::route('payment_method_add_new_form')
								->with('error', 'Revise los siguientes errores')
			                    ->withErrors($validator_pm_form)
			                    ->withInput();
			}
		}


		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			$pm = PaymentMethod::find($id);
			return View::make('admin.payment_methods.payment-methods-edit')
						->with('pm', $pm);
		}


		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			$validator_pm_form = Validator::make(Input::all(), 
												 PaymentMethod::$rules_pm_form, 
												 PaymentMethod::$messages);

			if($validator_pm_form->passes()) {
			    $pm                 = PaymentMethod::find($id);
			    $pm->payment_method = Input::get('payment_method');
			    $pm->description    = Input::get('description');

			    $pm->save();

			    return Redirect::route('payment_method_list');

			} else {
			    return Redirect::to('/admin/payment_methods/edit/'.$id)
			    				->with('error', 'Revise los siguientes errores')
			                    ->withErrors($validator_pm_form)
			                    ->withInput();
			}
		}

		public function getActive()
		{
		    $id    = Input::get('id');
		    $id_pm = PaymentMethod::findOrFail($id);

		    if($id_pm != "") {
		        $id_pm->active = $id_pm->active ? false : true;
		        $id_pm->save();
		    }
		    return Redirect::route('payment_method_list');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			$id_pm = PaymentMethod::findOrFail($id);

			if($id_pm != ""){
			   $id_pm->delete();
			}
			return Redirect::route('payment_method_list')
							->with('success', 'Método de pago eliminado correctamente');
		}
}