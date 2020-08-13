<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
ini_set('display_errors',1);
error_reporting(E_ALL);

$app->post('/member/login', function (Request $request, Response $response, array $args) {
    
    $body = $request->getBody();
    $bodyArray = json_decode($body,true);

    $conn = $GLOBALS['dbconn']; 
    $pwdIndb = getPasswordFromDB($conn,$bodyArray['email']);
    if (password_verify($bodyArray['password'],$pwdIndb)){
        // echo "Login Success";
    $stmt = $conn->prepare("select * from users where email =?" );
    $stmt->bind_param("s", $bodyArray['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){

        
        array_push($data,$row);
    }

    $json = json_encode($data);
    $response->getBody()->write($json);

    // $response->getBody()->write("Number rows, $num");
    
    }
    else{
        $json = json_encode("password error");
        $response->getBody()->write($json);
      
    }
    return $response->withHeader('Content-Type','application/json');
});



function getPasswordFromDB($conn,$email){
    $stmt = $conn->prepare("select password from users where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        return $row["password"];
    }else{
        return " ";
    }
}

$app->post('/member/register', function (Request $request, Response $response, array $args) {
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