<?php

namespace classes\validation;

use classes\database\Database;
use PDO;

class Validation{

	private $dbConnect;
	public $validationStatus = true;
	public $error = "";

	public function __construct(){
		$this->dbConnect = new Database();
	}

	public function registerValidationEmail($email){
		$sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (filter_var($sanitizedEmail,FILTER_VALIDATE_EMAIL)==false || ($email!=$sanitizedEmail)) {
			$this->validationStatus = false;
			$this->error .= "Wrong email address! ";
		}
		else{
			$queryContent = "SELECT id FROM users WHERE email='$email'";
			$response = $this->dbConnect->dbQuery($queryContent);
			$emailRepeats = $response->rowCount();
			if ($emailRepeats>0) {
				$this->validationStatus = false;
				$this->error .= "Account with this email address already exists! ";
			}
		}
	}

	public function registerValidationPasswords($formPassword, $formRepeatedPassword){
		$password = htmlentities($formPassword, ENT_QUOTES, "UTF-8");
		$repeatedPassword = htmlentities($formRepeatedPassword, ENT_QUOTES, "UTF-8");

		if (strlen($password)<8) {
			$this->validationStatus = false;
			$this->error .= "The password must be at least than 8 characters! ";
		}
		elseif ($password != $repeatedPassword) {
			$this->validationStatus = false;
			$this->error .= "The passwords are different! ";
		}
	}

	public function registerValidationRecaptcha($secretKey){
		$checkRecaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['gRecaptchaResponse']);
		$response = json_decode($checkRecaptcha);
		if ($response->success==false) {
			$this->validationStatus = false;
			$this->error .= "Negative reCATPCHA test! ";
		}
	}

	public function logInValidationEmail($formEmail){
		$email = htmlentities($formEmail, ENT_QUOTES, "UTF-8");
		$sanitizedEmail = filter_var($formEmail, FILTER_SANITIZE_EMAIL);

		if (filter_var($sanitizedEmail,FILTER_VALIDATE_EMAIL) == false || ($formEmail!=$sanitizedEmail)) {
			$this->validationStatus = false;
			$this->error = "Wrong email or password! ";
			return $sanitizedEmail;
		} 
	}

	public function logInValidationPassword($formPassword, $formEmail){
		$queryContent = "SELECT * FROM users WHERE email LIKE BINARY '$formEmail'";
		$response = $this->dbConnect->dbQuery($queryContent);

		$accountRepeats = $response->rowCount();

		if($accountRepeats==0) {
			$this->validationStatus = false;
			$this->error = "Wrong email or password! ";
		}
		elseif($accountRepeats==1){
			$row = $response->fetchAll(PDO::FETCH_ASSOC);
			$hashedPassword = $row[0]['password'];
			if(password_verify($formPassword,$hashedPassword)!=true){
				$this->validationStatus = false;
				$this->error = "Wrong email or password! ";
			}
			else{
				$userId = $row[0]['id'];
				return $userId;
			}
		}
	}

}