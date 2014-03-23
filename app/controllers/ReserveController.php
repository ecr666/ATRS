<?php
class ReserveController extends BaseController{

	public function getCreate(){

		return View::make('reservations.insert_places_date');
	}
	public function postCreate(){

		$rules = array(
			'from'      	 	=> 'required',
			'to'      			=> 'required',
			'departing'      	=> 'required|date',
			'class' 			=> 'required',
			'seats' 			=> 'required|Numeric'
		);
		$validator = Validator::make(Input::all(), $rules);
		

		// process the login
		if ($validator->fails()) {
			return Redirect::to('/reserve')
				->withErrors($validator);
		} else {
			
			$flights = DB::table('flight_specific')
						->join('Departure_flight_airport', 'flight_specific.ID', '=', 'Departure_flight_airport.ID')
						->join('Arrival_flight_airport', 'flight_specific.ID', '=', 'Arrival_flight_airport.ID')
						->where('Departure_flight_airport.Airport_ID','=',Input::get('from'))
						->where('Arrival_flight_airport.Airport_ID','=',Input::get('to'))
						->where('flight_specific.flight_date','>=',Input::get('departing'))
						->select('flight_specific.ID', 'flight_specific.flight_date','flight_specific.businessClassPrice','flight_specific.economyClassPrice','flight_specific.businessClassCapacity','flight_specific.economyClassCapacity')->get();
	
			return View::make('reservations.availableRoutes')
			->with('flights', $flights);
		}
		
	}


}