<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);

$app->get('/province', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from provinces";
    $result = $conn->query($sql);
    // $num = $result->num_rows;
    $data = array();
    while($row = $result->fetch_assoc()){
        array_push($data,$row);
    }

    $json = json_encode($data);
    $response->getBody()->write($json);

    // $response->getBody()->write("Number rows, $num");
    return $response->withHeader('Content-Type','application/json');
});


$app->post('/amphures', function (Request $request, Response $response, array $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body,true);
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select * from amphures where province_id = ?");
    $stmt->bind_param("s",$bodyArray['PATIENT_ID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result ->fetch_assoc()){
        array_push($data,$row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

?>