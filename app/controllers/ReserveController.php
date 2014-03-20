<?php
class ReserveController extends BaseController{

	public function getCreate(){

		return View::make('insert_places_date');
	}
	public function postCreate(){

		return 'hello';
	}
}