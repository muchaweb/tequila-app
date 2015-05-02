<?php

class APIProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return APIProduct::with('picture', 'content')->get();
	}
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_product_fk)
	{
		$product = APIProduct::with('picture','content')->find($id_product_fk);
		return $product;

	}
}
