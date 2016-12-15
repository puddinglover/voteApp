<?php
require 'db_connect.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
try {

  if(!isset($request->cookieID)){
    throw new Exception('NO COOKIE ID', 123);
  }

  if(gettype($request->cookieID) !== "string") {
    throw new Exception('Not correct type', 123);
  }
  $cookieID = $request->cookieID;

  if(!isset($request->userName)){
    die('No username given');
  };
  $userName = $request->userName;

  if(strlen($userName) < 5 ) {
    die("Username to short");
  }

  $sql =
  "UPDATE user
  SET username = :username
  WHERE cookie = :cookieID";
  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute(array(
    ':cookieID' => $cookieID,
    ':username' => $userName
  ));

  if($result !== true){
    throw new Exception('Something went wrong in SQL query');
  }
  
  echo json_encode($result);
} catch (Exception $e) {
  header('HTTP/1.0 400 Bad error');
  echo json_encode($e->getMessage());
}
