<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);
$app->get('/getfield', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from picturefield";
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
$app->get('/getstore', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from store";
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

$app->post('/getingfield', function (Request $request, Response $response, array $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body,true);
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("SELECT * FROM field LEFT JOIN picturefield ON picturefield.id_field=field.id_field WHERE id_store_field = ? ");
    $stmt->bind_param("s",$bodyArray['id_store']);
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
// select * from field FULL OUTER JOIN picturefield ON field.id_field = picturefield.id_field Where field.id_field = ?

?>