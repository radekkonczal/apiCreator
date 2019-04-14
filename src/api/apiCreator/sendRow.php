<?php

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api;

session_start();

$exchange = $_POST['exchange'];
$fromCurrency = $_POST['fromCurrency'];
$toCurrency = $_POST['toCurrency'];
$userId = $_SESSION['userId'];

$api->singleApiRowSend($exchange,$fromCurrency,$toCurrency,$userId);