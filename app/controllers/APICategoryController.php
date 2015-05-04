<?php

class APICategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return APICategory::with('list_categories')->get();
		//return APICategory::with('list_categories','picture', 'content')->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $category = APICategory::with('list_categories')->find($id);
	}

}
