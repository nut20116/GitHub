<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);

$app->post('/patient/edit', function (Request $request, Response $response, array $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body,true);
    $conn = $GLOBALS['dbconn']; 
    $stmt = $conn->prepare("update patient set STATUS = ? where PATIENT_ID = ?" );
    $stmt->bind_param("ss",$bodyArray['STATUS'],$bodyArray['PATIENT_ID']);
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result."");
    return $response;
    
});


?>