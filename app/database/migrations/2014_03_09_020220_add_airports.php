<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAirports extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//airports
		DB::table('airports')->insert(array(
				'AirportName'=>'CMB',
				'City'=>'Colombo',
				'State'=>'Srilanka'

			));
		DB::table('airports')->insert(array(
				'AirportName'=>'JFK',
				'City'=>'NewYork',
				'State'=>'USA'

			));
		DB::table('airports')->insert(array(
				'AirportName'=>'SIN',
				'City'=>'Singapore',
				'State'=>'Singapore'

			));
		DB::table('airports')->insert(array(
				'AirportName'=>'LHR',
				'City'=>'London',
				'State'=>'UK'

			));


		//flights

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		DB::table('airports')->where('AirportName','=','CMB')->delete();
		DB::table('airports')->where('AirportName','=','JFK')->delete();
		DB::table('airports')->where('AirportName','=','SIN')->delete();
		DB::table('airports')->where('AirportName','=','LHR')->delete();

	}

}
