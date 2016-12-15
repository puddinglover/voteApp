<?php
require 'db_connect.php';

$sql = "SELECT i.*, count(ul.idea_id) as number_of_likes
FROM idea AS i
LEFT JOIN user_likes AS ul
ON i.id = ul.idea_id
GROUP BY i.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
