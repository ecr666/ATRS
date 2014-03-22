<?php
class ReserveController extends BaseController{

	public function getCreate(){

		return View::make('reservations.insert_places_date');
	}
	public function postCreate(){

		$rules = array(
			'From'      	 	=> 'required',
			'To'      			=> 'required',
			'Date'      		=> 'required',
			'Class' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			
			$users = DB::table('users')->get();
			foreach ($users as $user)
			{
			    var_dump($user->name);
			}





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
		return 'hello';
	}
}