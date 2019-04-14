<?php

namespace classes\api;

use classes\database\Database;

class ChoiseList{

	private $dbConnect;

	public function __construct(){
		$this->dbConnect = new Database();
	}

	public function exchangesList(){
		$queryContent = "SELECT e_name FROM exchanges";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();
		$toPrint = '<option class="option">Select exchange</option>';

		foreach ($responseArray as $row) {
		    $toPrint .= '<option class="option" value="'.$row['e_name'].'">'.$row['e_name'].'</option>';
		}

		return $toPrint;
	}

	public function fromCurrencyList($exchangeName){
			$queryContent = "SELECT from_currenc FROM from_currency WHERE exchange_name='$exchangeName'";
			$response = $this->dbConnect->dbQuery($queryContent);
			$responseArray = $response->fetchAll();
			$prepared = '<option value="" class="option">Select from currency</option>';
			foreach ($responseArray as $row) {
    			$prepared .= '<option class="option" value="'.$row['from_currenc'].'">'.$row['from_currenc'].'</option>';
			}
			return $prepared;
	}

	public function toCurrencyList($fromCurrencyName,$exchangeName){
		$queryContent = "SELECT to_currency FROM pairs WHERE from_currency='$fromCurrencyName' 
						 AND exchange_name='$exchangeName'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();
		$prepared = '<option class="option" value="">Select to currency</option>';
		foreach ($responseArray as $row) {
   	 		$prepared .= '<option class="option" value="'.$row['to_currency'].'">'.$row['to_currency'].'</option>';
		}
		return $prepared;
	}
}