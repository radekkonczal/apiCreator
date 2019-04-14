<?php

session_start();

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api();

$list = $api->createInPreparationList($_SESSION['userId']);


$toPrint = '<table id="list_in_preparation" class="table table-striped table-hover table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Exchange</th>
			      <th scope="col">Pair</th>
			      <th scope="col">Remove</th>
			    </tr>
			  </thead>
			  <tbody>';

$itter = 1;
foreach ($list as $row) {
	$infoList = json_decode($row['info'],true);
    $toPrint .= '<tr>
			      <th scope="row">'.$itter.'</th>
			      <td>'.$infoList['exchangeName'].'</td>
			      <td>'.$infoList['fromCurrencyName'].'/'.$infoList['toCurrencyName'].'</td>
			      <td><button class="removeInPreparationRow" id="'.$row['id'].'" 
			      	type="submit"><i class="fas fa-trash-alt"></i></button></td>
			    </tr>';
	$itter += 1;
}

$toPrint .= '</tbody>
			</table>';

echo $toPrint;