<?php namespace Buonzz\Evorg;


class IndexNameBuilder{

	public function build($eventName){

		$indexname = 'evorg-events-'. \Config::get('evorg.app_id') 
			. '-' . $eventName . date("Y") . "." . date("m");

		return $indexname;
	}
}