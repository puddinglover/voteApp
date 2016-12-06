<?php
require 'db_connect.php';

$sql = "SELECT * FROM idea";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($result);
echo $json;
