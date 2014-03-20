<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCreater extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Airports', function($table)
                {
                        $table->increments('AirportCode');
						$table->string('AirportName',50);
						$table->string('City',20);
						$table->string('State',20);
						
                });
		Schema::create('Airplanes', function($table)
                {
                        $table->increments('AirplaneNum');
						$table->string('AirplaneName',20);
						$table->integer('AirportCode');
						$table->integer('businessClassCapacity');
						$table->integer('economyClassCapacity');
						
                });
		Schema::create('Flights', function($table)
                {
                        $table->increments('FlightNum');
						$table->timestamp('StartDateTime');
						$table->timestamp('ArriveDateTime');
						$table->integer('StartAirport');
						$table->integer('ArriveAirport');
						$table->integer('AirplaneNum');
						$table->decimal('businessClassPrice',8,2);
						$table->decimal('economyClassPrice',8,2);
						
                });
		Schema::create('Customers', function($table)
                {
                        $table->increments('CustomerID');
						$table->string('FirstName',20);
						$table->string('LastName',20);
						$table->string('Initials',10);
						$table->decimal('PassportNum',9,0);
						$table->decimal('TelephoneNum',12,0);
						$table->string('Email',30);
						
                });
		Schema::create('Payments', function($table)
                {
                        $table->increments('PaymentID');
						$table->string('PaymentMethod',4);
						$table->string('CreditCardType',4);
						$table->decimal('CreditCardNum',16,0);
						$table->timestamp('PaidDate');
						
                });
		Schema::create('Reservations', function($table)
                {
                        $table->integer('FlightNum');
						$table->timestamp('Start_Date_Time');
						$table->integer('Start_Airport');
						$table->integer('CustomerID');
						$table->string('Class',3);
						$table->string('SeatID',4);
						$table->integer('PaymentID');
						
                });

		
		

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('Airports');

		Schema::drop('Airplanes');
		Schema::drop('Flights');
		Schema::drop('Customers');
		Schema::drop('Payments');
		Schema::drop('Reservations');

	}

}
