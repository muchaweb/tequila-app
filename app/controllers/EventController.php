<?php

class EventController extends \BaseController {

	public function __construct()
	{

	    $this->beforeFilter('csrf', array('on' => 'post'));
	    $this->beforeFilter('auth', array('only' => array('/admin')));
	}

	/**
	 * Display a listing of the resource.
	 * GET /event
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = DB::table('events')
						->orderBy('events.event', 'asc')
	                    ->paginate(10);

	    return View::make('admin.events.events')
	    				->with('events', $events);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /event/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.events.events-new');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /event
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), EventModel::$rules, EventModel::$messages);
		if($validator->passes()) {		            
			$event              = new EventModel;

			$event->event       = Input::get('event');
			$event->description = Input::get('description');
			$event->active      = Input::get('active');

		    $event->save();

		    return Redirect::route('event_add_new_form')
		    				->with('success', 'Evento registrado correctamente');
		} else {
			return Redirect::route('event_add_new_form')
							->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /event/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = EventModel::find($id);
		return View::make('admin.events.events-edit')
					->with('event', $event);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), EventModel::$rules, EventModel::$messages);

		if($validator->passes()) {
		    $event              = EventModel::find($id);

		    $event->event       = Input::get('event');
		    $event->description = Input::get('description');

		    $event->save();

		    return Redirect::route('event_list');

		} else {
		    return Redirect::to('/admin/event/edit/'.$id)
		    				->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
		}
	}

	public function getActive()
	{
	    $id       = Input::get('id');
	    $id_event = EventModel::findOrFail($id);

	    if($id_event != "") {
	        $id_event->active = $id_event->active ? false : true;
	        
	        $id_event->save();
	    }
	    return Redirect::route('event_list');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id_event = EventModel::findOrFail($id);

		if($id_event != "") {
		   $id_event->delete();
		}
		return Redirect::route('event_list')
						->with('success', 'Evento eliminado correctamente');
	}
}