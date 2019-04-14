<?php
session_start();

use classes\api\Api;

require_once '../../../app/start.php';

$api = new Api();

$apiList = $api->createdApiList($_SESSION['userId']);



$toPrint = '<table id="prepare_list" class="table table-striped table-hover table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">URL address</th>
			      <th scope="col">Details</th>
			      <th scope="col">Remove</th>
			    </tr>
			  </thead>
			  <tbody>';

$itter = 1;
foreach ($apiList as $row) {
    $toPrint .= '<tr>
			      <th scope="row">'.$itter.'</th>
			      <td>'.$row['api_name'].'</td>
			      <td>'.'final/public/api/'.$row['unique_code'].'.json</td>
			      <td><button class="viewInformation" id="'.$row['api_id'].'" type="submit">
			      	<i class="fas fa-info"></i></button></td>
			      <td><button class="removeCreatedApi" id="'.$row['api_id'].'" type="submit">
			      	<i class="fas fa-trash-alt"></i></button></td>
			    </tr>';
	$itter += 1;
}

$toPrint .= '</tbody>
			</table>';

echo $toPrint;