<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
require 'db_connect.php';

// Change the vote for the idea. Returns an object that displays the action taken.
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

  $sql =
  "SELECT count(*) as the_id
  FROM user_likes
  WHERE user_id = :userID
  AND idea_id = :ideaID";
  $stmt = $pdo->prepare($sql);

  // Quick execution of a pdo statement with variables.
  $stmt->execute(array(
    ':userID' => $userID,
    ':ideaID' => $ideaID
  ));
  $exists = $stmt->fetchAll(PDO::FETCH_OBJ);

  if($exists[0]->the_id !== 0) {
    $result->action = 'unlike';
    $sql =
    "DELETE FROM user_likes
    WHERE user_id = :userID
    AND idea_id = :ideaID";

  } else if($exists[0]->the_id === 0){
    $result->action = 'like';
    $sql =
    "INSERT INTO user_likes (user_id, idea_id)
    VALUES (:userID, :ideaID)";
  }

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
