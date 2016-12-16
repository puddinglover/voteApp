<?php
require 'db_connect.php';

// Ajax call for returning the idea, the vote count and the different categories for the idea.

$sql = "SELECT i.*, count(ul.idea_id) as number_of_likes
FROM idea AS i
LEFT JOIN user_likes AS ul
ON i.id = ul.idea_id
GROUP BY i.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $r){
  $ideaID = $r['id'];

  $sql = "SELECT c.name
  FROM idea_has_category AS ihc
  LEFT JOIN category AS c
  ON ihc.category_id = c.id
  WHERE ihc.idea_id = :ideaID
  GROUP BY ihc.category_id";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':ideaID', $ideaID);
  $stmt->execute();


  $r['category'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response[] = $r;
}

header('Content-Type: application/json');
echo json_encode($response);
