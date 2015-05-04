<?php

class APIProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = APIProduct::with('picture', 'content','box')->get();
		return $products;
	}
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	*/
	public function show($id)
	{
		$product = APIProduct::with('picture','content', 'box')->find($id);
		return $product;
	}
}
