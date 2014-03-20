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
		
		DB::table('airports')->insert(array(
				'AirportName'=>'Katunayaka',
				'City'=>'Colombo',
				'State'=>'Srilanka'

			));
		DB::table('airports')->insert(array(
				'AirportName'=>'Heethru',
				'City'=>'London',
				'State'=>'UK'

			));
		DB::table('airports')->insert(array(
				'AirportName'=>'Fuji',
				'City'=>'Tokiyo',
				'State'=>'Japan'

			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		DB::table('airports')->where('AirportName','=','Katunayaka')->delete();
		DB::table('airports')->where('AirportName','=','Heethru')->delete();
		DB::table('airports')->where('AirportName','=','Fuji')->delete();
	}

}
