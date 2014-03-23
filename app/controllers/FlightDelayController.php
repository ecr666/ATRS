<?php

class FlightDelayController extends BaseController {

	public $restful = true;

	public function index(){
		// get all the nerds
		$flight_delay = flight_delay::all();

		// load the view and pass the nerds
		return View::make('flightDelay.index')
			->with('flight_delay', $flight_delay);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('flightDelay.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'ID'    			=> 'required',
			'scheduled_time'	=> 'required',
			'new_time' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('delayedFlights/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$temp = new flight_delay;
			$temp->ID 			    	= Input::get('ID');
			$ID  ->$temp;
			$temp->scheduled_time   	= Input::get('scheduled_time');
			$temp->new_time 			= Input::get('new_time');
			$temp->save();


			// redirect
			Session::flash('message', 'Successfully Added details');
			
			$request = Request::create('/notify', 'GET', $ID);
			return Route::dispatch($request)->getContent();

			return Redirect::to('delayedFlights');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			// get the nerd
			$flight_delay = flight_delay::find($id);

			// show the view and pass the nerd to it
			return View::make('flight_delay.show')
			->with('flight_delay', $flight_delay);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			// get the nerd
			$flight_delay = flight_delay::find($id);

			// show the edit form and pass the nerd
			return View::make('flight_delay.edit')
			->with('flight_delay', $flight_delay);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'ID'     		    => 'required',
			'scheduled_time'  	=> 'required',
			'new_time' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('delayedFlights/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$temp = airports::find($id);
			$temp->ID       		= Input::get('ID');
			$temp->scheduled_time   = Input::get('scheduled_time');
			$temp->new_time 		= Input::get('new_time');
			$temp->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('delayedFlights');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//	
	}
}