<?php

class APIEventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = APIEvent::all();
		return $events;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	*/
	public function show($id)
	{
		$event = APIEvent::with('template_event')->find($id);
		return $event;
	}
}
