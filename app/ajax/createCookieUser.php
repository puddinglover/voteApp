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
  "INSERT INTO user (cookie)
  VALUES (:cookieID)";
  $stmt = $pdo->prepare($sql);

  $result = $stmt->execute(array(':cookieID' => $cookieID));

  echo json_encode($result);
} catch (Exception $e) {
  header('HTTP/1.0 400 Bad error');
  echo json_encode($e->getMessage());
}
