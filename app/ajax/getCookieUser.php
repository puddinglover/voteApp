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

  $sql =
  "SELECT id, cookie, username
   FROM user
   WHERE cookie = :cookieID";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':cookieID' => $cookieID));

  $result = $stmt->fetchAll(PDO::FETCH_OBJ);

  if(count($result) === 0){
    $result[0] = false;
  }

  echo json_encode($result[0]);
} catch (Exception $e) {
  header('HTTP/1.0 400 Bad error');
  echo json_encode($e->getMessage());
}
