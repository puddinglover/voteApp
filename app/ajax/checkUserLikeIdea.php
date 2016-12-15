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

  $sql =
  "SELECT count(*) as the_id
  FROM user_likes
  WHERE user_id = :userID1
  AND idea_id = :ideaID1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':userID1' => $userID,
    ':ideaID1' => $ideaID
  ));
  $exists = $stmt->fetchAll(PDO::FETCH_OBJ);

  if($exists[0]->the_id !== 0) {
    $result = true;
  } else {
    $result = false;
  }

  echo json_encode($result);
} catch (Exception $e) {
  header('HTTP/1.0 400 Bad error');
  echo json_encode($e->getMessage());
}
