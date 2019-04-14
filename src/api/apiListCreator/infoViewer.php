<?php

session_start();

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api();

$infoList = $api->infoListCreate($_SESSION['userId'], $_POST['apiId']);

echo $infoList;