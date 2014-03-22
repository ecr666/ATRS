<?php
class ReserveController extends BaseController{

	public function getCreate(){

		return View::make('reservations.insert_places_date');
	}
	public function postCreate(){

		$rules = array(
			'from'      	 	=> 'required',
			'to'      			=> 'required',
			'departing'      	=> 'required',
			'class' 			=> 'required',
			'seats' 			=> 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		

		// process the login
		if ($validator->fails()) {
			return Redirect::to('/reserve')
				->withErrors($validator);
		} else {
			
			$flights = DB::table('flight_specific')->select('ID', 'flight_date','businessClassPrice','economyClassPrice','businessClassCapacity','economyClassCapacity')->get();
			return View::make('reservations.availableRoutes')
			->with('flights', $flights);

			
		}
		
	}
}