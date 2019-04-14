<?php

namespace classes\api;

use classes\database\Database;
use classes\api\KeyGenerator;
use classes\exchanges\CheckoutExchange;

class Api{

	private $dbConnect;

	public function __construct(){
		$this->dbConnect = new Database();
	}

	public function createdApiList($userId){
		$queryContent = "SELECT api_id,unique_code,api_name FROM api_list WHERE user_id='$userId'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();
		return $responseArray;	
	}

	public function singleApiRowSend($exchange,$fromCurrency,$toCurrency,$userId){
		$info = '{"exchangeName":"'.$exchange.'", "fromCurrencyName":"'.$fromCurrency.
					'", "toCurrencyName":"'.$toCurrency.'"}';

		$queryContent = "SELECT info FROM api_in_preparation WHERE info='$info'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();

		if((count($responseArray)) == 0){
			$queryContent = "INSERT INTO api_in_preparation VALUES (NULL,'$userId','$info')";
			$response = $this->dbConnect->dbQuery($queryContent);
		}
		else{
			$error = "This currency pair already exists!";
			echo $error;
		}
	}

	public function createInPreparationList($userId){
		$queryContent = "SELECT info,id FROM api_in_preparation WHERE user_id='$userId'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();
		return $responseArray;	
	}

	public function removeInPreparationRow($idToRemove){
		$queryContent = "DELETE FROM api_in_preparation WHERE id='$idToRemove'";
		$response = $this->dbConnect->dbQuery($queryContent);	
	}

	public function removeCreatedApi($idToRemove){
		$queryContent = "DELETE FROM api_list WHERE api_id='$idToRemove'";
		$response = $this->dbConnect->dbQuery($queryContent);	
	}

	public function apiCreate($userId, $apiName){
		$keyGenerator = new KeyGenerator();
		$key = $keyGenerator->generateCode(20);

		$queryContent = "SELECT info FROM api_in_preparation WHERE user_id='$userId'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$responseArray = $response->fetchAll();

		if((count($responseArray)) != 0){
			$jsonApiInfoPrepare = "[";
			foreach ($responseArray as $row) {
    			$jsonApiInfoPrepare .= $row['info'].",";
			}
			$jsonApiInfoPrepare = (rtrim($jsonApiInfoPrepare, ','))."]";
			$queryContent = "INSERT INTO api_list VALUES (NULL,'$userId','$key','$jsonApiInfoPrepare','$apiName')";
			$response = $this->dbConnect->dbQuery($queryContent);
		
			$queryContent = "DELETE FROM api_in_preparation WHERE user_id='$userId'";
			$response = $this->dbConnect->dbQuery($queryContent);
		}
	}

	public function finalJsonBuild($key){
		$correctLength = 20;
		$sanitizedKey = htmlentities($key, ENT_QUOTES, "UTF-8");
		if(strlen($sanitizedKey)==$correctLength){
			$queryContent = "SELECT api_info FROM api_list WHERE unique_code='$sanitizedKey'";
			$response = $this->dbConnect->dbQuery($queryContent);
			$responseArray = $response->fetchAll();
			if((count($responseArray)) != 0){
				$infoList = json_decode($responseArray[0]['api_info'],true);
				foreach ($infoList as $row) {
					$exchangeName = $row['exchangeName'];
    				$fromCurrencyName = $row['fromCurrencyName'];
    				$toCurrencyName = $row['toCurrencyName'];
    				$checkoutExchange = new CheckoutExchange($exchangeName,$fromCurrencyName,$toCurrencyName);
    				$singleApiRowArray = $checkoutExchange->exchangeSelection();
    				$apiArray[] = $singleApiRowArray;
				}
				return $apiArray;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function removeAllInPreparation($userId){
		$queryContent = "DELETE FROM api_in_preparation WHERE user_id='$userId'";
		$response = $this->dbConnect->dbQuery($queryContent);
	}

	public function infoListCreate($userId, $apiId){
		$queryContent = "SELECT api_info FROM api_list WHERE user_id='$userId' AND api_id='$apiId'";
		$response = $this->dbConnect->dbQuery($queryContent);
		$apiList = $response->fetchAll();
		$info = '';

		foreach ($apiList as $row) {
			$jsonInfo = $row['api_info'];
			$decodeInfo = json_decode($jsonInfo,true);
			foreach ($decodeInfo as $decodeRow) {
				$info .= '['.$decodeRow['exchangeName'].'] ['.$decodeRow['fromCurrencyName'].
						'/'.$decodeRow['toCurrencyName'].']      ';
			}
		}
		return $info;
	}
}
