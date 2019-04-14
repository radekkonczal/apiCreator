<?php

use classes\api\ChoiseList;

require_once '../../../app/start.php';

$choiseList = new ChoiseList();

echo $choiseList->fromCurrencyList($_POST['exchangeName']);