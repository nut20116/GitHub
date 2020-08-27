<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);

$app->get('/usermember', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $sql = "select * from usermember";
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

$app->post('/usermember/login', function (Request $request, Response $response, array $args) {
    $body = $request->getBody();
    $bodyArr = json_decode($body,true);
    $conn = $GLOBALS['dbconn']; // groblas หาทั้ง project
    $stmt = $conn->prepare("SELECT * FROM usermember WHERE username_member=? and password_member=?");
    $stmt -> bind_param("ss",$bodyArr['username_member'],$bodyArr['password_member']);
    $stmt->execute(); 
    $result = $stmt->get_result();
    $data=array();
    if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
               array_push($data,$row);
            }
            $json = json_encode($data);
            $response->getBody()->write($json);
        
    }else{
        echo "Login failed!!!";
    }

    // $response->getBody()->write("Number rows, $num");
    return $response->withHeader('Content-Type','application/json');
});

$app->post('/usermember/register', function (Request $request, Response $response, array $args) {
    date_default_timezone_set('Asia/Bangkok');
    $DATETIME = date_create()->format('Y-m-d h:i:s');
    ////////////////////////
    $conn = $GLOBALS['dbconn']; 
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $stmt = $conn->prepare("insert into usermember"."(username_member,password_member,firstname_member,lasname__member,email_member,address_member,telephone_member,status_member) "." values (?,?,?,?,?,?,?,?)"); 
    $stmt ->bind_param('ssssssss', $bodyArray['username_member'],$bodyArray['password_member'],$bodyArray['firstname_member'],$bodyArray['lasname__member'],$bodyArray['email_member'],$bodyArray['address_member'],$bodyArray['telephone_member'],$bodyArray['status_member']);
    $stmt->execute(); 
    $result = $stmt ->affected_rows;
    $response->getBody() ->write($result." ");
    return $response->withHeader('Content-Type', 'application/json');
});



?>