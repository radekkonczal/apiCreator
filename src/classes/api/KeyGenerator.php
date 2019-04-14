<?php

namespace classes\api;

use classes\database\Database;

class KeyGenerator{

	private $dbConnect;

	public function __construct(){
		$this->dbConnect = new Database();
	}

	public function generateCode($legth){
		do {
			$preaparedCode = substr(md5(date("d.m.Y.H.i.s").rand(1,1000000)) , 0 , $legth);
			$queryContent = "SELECT unique_code FROM api_list 
							WHERE unique_code='$preaparedCode'";
			$response = $this->dbConnect->dbQuery($queryContent);
			$responseCount = count($response->fetchAll());
		}while ($responseCount!=0);

		return $preaparedCode;
	}
}

