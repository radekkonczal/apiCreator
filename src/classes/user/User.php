<?php

namespace classes\user;

use classes\database\Database;

class User{
	
	public function usernameLength($email,$maxLength){
		$username = substr($email, 0, strpos($email, '@'));
		if(strlen($username)<=$maxLength){
			return $username;
		}
		else{
			$shortUsername = substr($username, 0, $maxLength);
			$shortUsername .= "...";
			return $shortUsername;
		}
	}

	public function createAccount($password, $email){
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$queryContent = "INSERT INTO users VALUES (NULL, '$email', '$hashedPassword')";
		$dbConnect = new Database();
		$response = $dbConnect->dbQuery($queryContent);
	}

	public function logIn($userId, $email){
		session_start();
		$_SESSION['logged'] = true;
		$_SESSION['userId'] = $userId;
		$_SESSION['userEmail'] = $email;
	}
}