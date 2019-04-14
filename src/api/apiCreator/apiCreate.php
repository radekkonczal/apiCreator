<?php

session_start();

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api();

$apiName = trim(htmlspecialchars($_POST['apiName']));

if($apiName != ""){
	$maxLength = 20;
	if(strlen($apiName)<$maxLength){
		$response = $api->apiCreate($_SESSION['userId'], $apiName);
		$information = "A new api was created. Go to the API list to see the generated code.";
		echo $information;
	}
	else{
		$error = "Name can not be longer than 20 characters.";
		echo $error;
	}
}
else{
	$error = "Please complete API's name first.";
	echo $error;
}