<?php


class functions{



/*	public function __construct(){
		$this->token=null;
		$this->$url="";
	}
*/

	public function pais(){
		$token="208a791111513078e119febcce207fe3";
		$url="https://battuta.medunes.net/api/country/all/?key=".$token;
		return $url;
	}
}
#https://battuta.medunes.net/api/country/all/?key=


?>