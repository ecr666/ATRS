<?php
//notify when table is updated
class NotificationController extends BaseController{

public function sendMail($customer,$ID,$time,$airportDep,$airportAri){

	foreach ($customer as $key => $value) {
			
			$email= $value->email;
			
/*
	Mail::send('emails.notification',array('lastname'=> ,flightID'=>$ID,'flightDateTime'=>$time,'newFlightDateTime'=>$time,'departureAirport'=>$airportDep,'arrivalAirport'=>$airportAri),function($message){

			$message-> to($email,$lastname)->subject('Flight update details');
		});}
		*/
}
		return Redirect::to('delayedFlights/create');
}
public function sendMaildetails($ID){
	echo $ID;

	//Config::set('database.fetch', PDO::FETCH_ASSOC);
	$delayFlightID='F1451L';
	$customer=DB::table('reservations')
			->join('flight_specific',function($join){
				$join->on('reservations.flight_specificID','=','flight_specific.ID')
			;})
			//->select('CustomerID')
	   	 	//->where('reservations.flight_date','=','flight_specific.flight_date')			
			->join('users','users.ID','=','reservations.CustomerID')	
			->select('email','lastname')
			->where('flight_specificID','=',$delayFlightID)
			->distinct()
			;//->get() ;

	$time=DB::table('flight_delay')
			->select('scheduled_time','new_time')
			->where('ID','=',$delayFlightID)
			->distinct();

	$airportDep=DB::table('Departure_flight_airport')
			->join('Flight','flight.ID','=','Departure_flight_airport.ID')
			->join('Airports','Airport.ID','=','Departure_flight_airport.Airport_ID')
			->select('AirportName' )
			->distinct()
			->get();

	$airportAri=DB::table('Arrival_flight_airport')
			->join('Flight','flight.ID','=','Arrival_flight_airport.ID')
			->join('Airports','Airport.ID','=','Arrival_flight_airport.Airport_ID')
			->select('AirportName' )
			->distinct()
			->get();

	 $this->sendMail($customer,$ID,$time,$airportDep,$airportAri);
	
/*			
foreach ($customer as $key => $value) {
	$emails=json_encode($value);
}
		//	echo eloquent_to_json($customer);
	
//	return Response::json($emails->toArray());
	/*$array = array_map(function($object) {
     return $object->to_array();
}, $customer);
$emailArrya=$emails->toArray();
/*	return array_map(function($val)
{
    return json_decode(json_encode($val), true)
}, $customer);*/
	/*DB::table('users')
        ->join('contacts', function($join)
        {	
            $join->on('users.id', '=', 'contacts.user_id')->orOn(...);
        })
        ->get();*/
}

}

