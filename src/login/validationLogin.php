<?php

use classes\validation\Validation;
use classes\user\User;

require_once '../../app/start.php';

$formEmail = $_POST['emailLog'];
$formPassword = $_POST['passwordLog'];

$validation = new Validation();
$response = $validation->logInValidationEmail($formEmail);

$validationStatus = $validation->validationStatus;

if($validationStatus = true){
	$response = $validation->logInValidationPassword($formPassword, $formEmail);
	$validationStatus = $validation->validationStatus;
	if ($validationStatus == true) {
		$user = new User();
		$userId = $response;
		$user->logIn($userId, $formEmail);
		$finalResponse = '{"validationStatus":"true"}';
		echo $finalResponse;
	}
	elseif($validationStatus == false){
		$error = $validation->error;
		$finalResponse = '{"validationStatus":"false","information":"'.$error.'"}';
		echo $finalResponse;
	}
}