<?php

use classes\user\User;
use classes\validation\Validation;

require_once '../../app/start.php';

if (isset($_POST['email'])) {
	$registerValidation = new Validation;


	$email = $_POST['email'];
	$registerValidation->registerValidationEmail($email);

	$formPassword = $_POST['password'];
	$formRepeatedPassword = $_POST['repeatedPassword'];
	$registerValidation->registerValidationPasswords($formPassword, $formRepeatedPassword);

	$validationStatus = $registerValidation->validationStatus;

	if ($validationStatus == true) {
		$user = new User;
		$user->createAccount($formPassword, $email);
		$information = "Congratulations! Registration successful. You can now login to the website.";
		$finalResponse = '{"validationStatus":"true","information":"'.$information.'"}';
		echo $finalResponse;
	}
	elseif($validationStatus == false){
		$error = $registerValidation->error;
		$finalResponse = '{"validationStatus":"false","information":"'.$error.'"}';
		echo $finalResponse;
	}

}
