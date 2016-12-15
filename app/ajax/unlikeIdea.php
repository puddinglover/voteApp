<?php
require 'db_connect.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

try {

  if(!isset($request->userID) || !isset($request->ideaID)){
    throw new Exception('MISSING ID');
  }

  if(gettype($request->userID) !== "integer" || gettype($request->ideaID) !== "integer") {
    throw new Exception('Not correct type');
  }

  $userID = $request->userID;
  $ideaID = $request->ideaID;
  $result = new stdClass();


  $result->action = 'unlike';
  $sql =
  "DELETE FROM sustainable_valley_db.user_likes
  WHERE user_id = :userID
  AND idea_id = :ideaID";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':userID', $userID);
  $stmt->bindParam(':ideaID', $ideaID);
  $result->executed = $stmt->execute();

  if($result->executed !== true){
    throw new Exception('Something went wrong in SQL query');
  }
  echo json_encode($result);
} catch (Exception $e) {
  header('HTTP/1.0 400 Bad error');
  echo json_encode($e->getMessage());
}
