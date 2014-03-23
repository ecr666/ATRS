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
	public function postComplete(){

		$validator= Validator::make(Input::all(),array(
			'fNum'	=>'required',
			'fDate'	=>'required',
			'fClass'	=>'required',

			'lName' =>'required',
			'fName' =>'required',
			'inis' =>'required',
			'email' =>'required',
			'tel'  =>'required',
	/*		'pMethod' =>'required',
			'cCard' =>'required',
			'cNum' =>'required'			*/	
			));
//print_r(Input::all());
		if($validator->fails()){
			return Redirect::route('details-personal')
			->withErrors($validator)
			->withInput();

		}
		Session::flash('message', 'Successfully updated the airport!');
		return Redirect::route('home')
				->with('global','Your Reservation is Successful. Email is sent');
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