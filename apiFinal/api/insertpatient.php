<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);

$app->post('/patient/insert', function (Request $request, Response $response, array $args) {
    date_default_timezone_set('Asia/Bangkok');
    $DATETIME = date_create()->format('Y-m-d h:i:s');
    ////////////////////////
    $conn = $GLOBALS['dbconn']; 
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $stmt = $conn->prepare("insert into patient"."(FIRSTNAME,LASTNAME,JOB,DATE,TIME,PROVINCE,SEX) "." values (?,?,?,?,?,?,?)"); 
    $stmt ->bind_param('sssssss', $bodyArray['FIRSTNAME'],$bodyArray['LASTNAME'],$bodyArray['JOB'],$bodyArray['DATE'],$bodyArray['TIME'],$bodyArray['PROVINCE'],$bodyArray['SEX']);
    $stmt->execute(); 
    $result = $stmt ->affected_rows;
    $response->getBody() ->write($result."");
    return $response->withHeader('Content-Type', 'application/json');
});


?>