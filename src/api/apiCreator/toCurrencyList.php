<?php

use classes\api\ChoiseList;

require_once '../../../app/start.php';

$choiseList = new ChoiseList();

echo $choiseList->toCurrencyList($_POST['fromCurrencyName'], $_POST['exchangeName']);