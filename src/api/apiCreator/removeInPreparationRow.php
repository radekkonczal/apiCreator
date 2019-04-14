<?php

session_start();

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api();

$api->removeInPreparationRow($_POST['idToRemove']);