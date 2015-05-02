<?php

class CustomerController extends \BaseController {

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
		$customers = DB::table('customers')
						->orderBy('customers.created_at', 'desc')
						->paginate(10);

		return View::make('admin.customers.customers')
						->with('customers', $customers);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id_customer = Customer::findOrFail($id);

        if($id_customer != "") {
           $id_customer->delete();
        }
        return Redirect::route('customer_list')
        				->with('success', 'Cliente eliminado correctamente');
	}
}
