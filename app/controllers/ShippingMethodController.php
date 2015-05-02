<?php
class ShippingMethodController extends \BaseController {

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
		$shipping_methods = DB::table('shipping_methods')
								->orderBy('shipping_methods.ordering', 'desc')
                        		->paginate(10);

		return View::make('admin.shipping_methods.shipping-methods')
								->with('shipping_methods', $shipping_methods);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.shipping_methods.shipping-methods-new');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), ShippingMethod::$rules, ShippingMethod::$messages);

		if($validator->passes()) {		            
		    $sm                  = new ShippingMethod;

		    $sm->shipping_method = Input::get('shipping_method');
		    $sm->cost            = Input::get('cost');
		    $sm->description     = Input::get('description');
		    $sm->active          = Input::get('active');

		    $sm->save();

		    return Redirect::route('shipping_method_add_new_form')
		                            ->with('success', 'Método de envío registrado correctamente');

		} else {
			return Redirect::route('shipping_method_add_new_form')
		                            ->with('error', 'Revise los siguientes errores')
		                            ->withErrors($validator)
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
		$sm = ShippingMethod::find($id);
		return View::make('admin.shipping_methods.shipping-methods-edit')
					->with('sm', $sm);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ShippingMethod::$rules, ShippingMethod::$messages);

		if($validator->passes()) {
		    $sm                      = ShippingMethod::find($id);

		    $sm->shipping_method   	 = Input::get('shipping_method');
		    $sm->cost          	 	 = Input::get('cost');
		    $sm->description       	 = Input::get('description');

		    $sm->save();

		    return Redirect::route('shipping_method_list');

		} else {
		    return Redirect::to('/admin/shipping_methods/edit/'.$id)
		    				->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator_sm_edit_form)
		                    ->withInput();
		}
	}

	public function getActive()
	{
	    $id    = Input::get('id');
	    $id_sm = ShippingMethod::findOrFail($id);

	    if($id_sm != "") {
	        $id_sm->active = $id_sm->active ? false : true;
	        $id_sm->save();
	    }
	    return Redirect::route('shipping_method_list');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id_sm = ShippingMethod::findOrFail($id);

		if($id_sm != ""){
		   $id_sm->delete();
		}
		return Redirect::route('shipping_method_list')
						->with('success', 'Método de envío eliminado correctamente');
	}
}
