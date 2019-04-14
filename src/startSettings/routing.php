<?php

require_once __DIR__ . '/../../app/start.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use classes\api\Api;

$app = new \Slim\App;

session_start();

if(!isset($_SESSION['logged'])){
	$app->get('/', function ($request, $response, $args) {
    require_once __DIR__ . '/../../app/public/homepage/homepage.php';
	});
}
else{
	$app->get('/', function ($request, $response, $args) {
    require_once __DIR__ . '/../../app/public/dashboard/dashboard.php';
	});
}

$app->get('/public/api/{key}.json', function ($request, $response, $args) {
    $api = new Api;
    $key = $args['key'];
    $apiArray = $api->finalJsonBuild($key);
    if($apiArray==false){
        return $response->withStatus(404);
    }
    else{
        $newResponse = $response->withJson($apiArray);
        return $newResponse;
    }
});

$app->run();