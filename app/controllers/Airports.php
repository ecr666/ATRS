<?php

class Airports extends BaseController {

	public $restful = true;
	//public $layout = 'layouts.default';
	public function get_index(){
		//return View::make('airports.index',array('title'=> 'Airports'));
		//rerive data
		return View::make('airports.index',array('title'=> 'Airports'))->with('airports' , Airport::all());

		//return View::make('airports.index');



		//$view = View::make('airports.index',array('name'=>'Katunayaka'));
		//$this->layout->title = 'Testing Phase';
		//$this->layout->content = $view;
		//return $view;
	}
}