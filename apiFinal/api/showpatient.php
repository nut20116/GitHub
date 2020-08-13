<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);


$app->get('/patient', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from patient";
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
$app->get('/province', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from province";
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
$app->get('/sex/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from sex where SEX_ID  LIKE '%$id%'";
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
$app->get('/status', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from status";
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


$app->get('/patient/status/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select * from patient where STATUS  LIKE '%$id%'");
    // $stmt ->bind_param('s',$pCode);
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
$app->get('/patient/statuss/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select * from patient where STATUS  LIKE '%$id%'");
    // $stmt ->bind_param('s',$pCode);
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
$app->get('/patient/PROVINCE', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("SELECT * FROM patient ORDER BY patient.PROVINCE ASC");
    // $stmt ->bind_param('s',$pCode);
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
$app->get('/patient/PROVINCE2', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("SELECT * FROM patient ORDER BY patient.PROVINCE DESC");
    // $stmt ->bind_param('s',$pCode);
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
$app->get('/patient/name', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("SELECT * FROM patient ORDER BY patient.FIRSTNAME ASC");
    // $stmt ->bind_param('s',$pCode);
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
$app->get('/patient/name2', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("SELECT * FROM patient ORDER BY patient.FIRSTNAME  DESC");
    // $stmt ->bind_param('s',$pCode);
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