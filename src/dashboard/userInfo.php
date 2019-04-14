<?php

use classes\user\User;

require_once '../../app/start.php';

session_start();

if(isset($_SESSION['userEmail'])){
	$user = new User;
	$username = $_SESSION['userEmail'];
	$shortUsername = $user->usernameLength($username,15);
	echo $shortUsername;
}
