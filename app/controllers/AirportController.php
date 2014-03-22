<?php

class AirportController extends BaseController {

	public $restful = true;

	public function index(){
		// get all the nerds
		$airports = airport::all();

		// load the view and pass 
		return View::make('airports2.index')
			->with('airports', $airports);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('airports2.create');
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
			'AirportName'       => 'required',
			'City'      		=> 'required',
			'Country' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$temp = new airport;
			$temp->AirportName      = Input::get('AirportName');
			$temp->City      		= Input::get('City');
			$temp->State 			= Input::get('Country');
			$temp->save();

			// redirect
			Session::flash('message', 'Successfully created the airport!');
			return Redirect::to('airports');
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
			$airport = airports::find($id);

			// show the view and pass the nerd to it
			return View::make('airpors.show')
			->with('airport', $airports);
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
			$airport = airports::find($id);

			// show the edit form and pass the nerd
			return View::make('airpors.edit')
			->with('airport', $airports);
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
			'AirportName'       => 'required',
			'City'      		=> 'required',
			'Country' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('airports/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$temp = airports::find($id);
			$temp->AirportName       = Input::get('AirportName');
			$temp->City      = Input::get('City');
			$temp->State = Input::get('Country');
			$temp->save();

			// redirect
			Session::flash('message', 'Successfully updated the airport!');
			return Redirect::to('airports');
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