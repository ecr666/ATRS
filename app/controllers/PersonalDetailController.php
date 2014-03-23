<?php
class PersonalDetailController extends BaseController{

	public function getCreate(){

		$fData=array(
				$fNum 	=Input::get('fNum'),
				$fDate = Input::get('fDate')
				//'fNum' 	=>Input::get('fNum'),
				//'fDate' => Input::get('fDate')
				);
		//$fNum="abc";
		//Session::flash('fNum', $fNum);     
 		//Redirect::to('/reserve/personal');
		return View::make('reservations.personal_details')->with('fData', Input::get('fNum'));
	}
	public function getComplete(){
	
			return View::make('reservations.availableRoutes');
	}
	public function postComplete(){

		$validator= Validator::make(Input::all(),array(
			 'fNum'	=>'required',
			'fDate'	=>'required|date',
			'fClass'	=>'required',

			'lName' =>'required',
			'fName' =>'required',
			'inis' =>'required',
			'email' =>'required|email',
			'tel'  =>'required',
		    'pMethod' =>'required',
			'cCard' =>'required',
			'cNum' =>'required|Numeric'			
			));
//print_r(Input::all());
		if($validator->fails()){/*
			return Redirect::route('flights-reserve-completed')
			->withErrors($validator)
			->withInput();*/

		}
		else{

			$temp = new  users;
			$temp->FirstName      = Input::get('lName');
			$temp->LastName      		= Input::get('fName');
			$temp->Initials 			= Input::get('inis');
			$temp->TelephoneNum     		= Input::get('tel');
			$temp->Email 			= Input::get('email');
			$temp->save();

			$cusID = DB::table('users')->max('ID');
			//echo ($count);

			$temp2 = new  Payments;
			$temp2->PaymentMethod      = Input::get('pMethod');
			$temp2->CreditCardType      		= Input::get('cCard');
			$temp2->CreditCardNum 			= Input::get('cNum');
			$temp2->amount     		= Input::get('888888');
			$temp2->save();

			$payID = DB::table('Payments')->max('ID');

			$temp3 = new  Reservations;
			$temp3->flight_specificID      = Input::get('fNum');
			$temp3->flight_date      		= Input::get('fDate');
			$temp3->CustomerID 			= $cusID;
			$temp3->Class     		= Input::get('fClass');
			$temp3->SeatID 			= $cusID;
			$temp3->PaymentID     		= $payID;
			$temp3->save();

			$revID = DB::table('Reservations')->max('ID');

			$temp4 = new  paymentReservation;
			$temp4->reservation_ID      = $revID;
			$temp4->payment_ID      		= $payID;
			$temp4->paid_date 			= "24032014";
			$temp4->save();

		Session::flash('message', 'Your reservation added successfully!');
		return Redirect::route('home')
				->with('global','Your Reservation is Successful. Email is sent');

		}
	}
	public function postCreate(){

		$validator= Validator::make(Input::all(),array(
				'lastname'			=>'required|max:20',
				'firstname'			=>'max:20',
				'initials'			=>'required|max:10',
				'email'				=>'required|email|unique:users',
				'telephonenum'		=>'required|max:20',
				'passportnum'		=>'max:20'
				
			));
//print_r(Input::all());
		if($validator->fails()){
			return Redirect::route('details-personal')
			->withErrors($validator)
			->withInput();

		}
		else{
			//save details

			$lastname		=Input::get('lastname');
			$firstname		=Input::get('firstname');
			$initials		=Input::get('initials');
			$email			=Input::get('email');
			$telephonenum	=Input::get('telephonenum');
			$passportnum	=Input::get('passportnum');
			
				
			//activation code
			//$code	=str_random(60);	 
			$user =User::create(array(
				'lastname' 	=> $lastname,
				'firstname' => $firstname,
				'initials' 	=> $initials,
				'email'		=> $email,
				'telephonenum'	=> $telephonenum,
				'passportnum'	=> $passportnum
				//'code'	=> $code,
				//'active' => 0
				));

			if($user){
				return Redirect::route('home')
				->with('global','Your Reservation is Successful. Email is sent');
			}
			}

		}

		
	}