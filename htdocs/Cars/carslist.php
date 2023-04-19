<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=carshop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();
}


$stmt = $conn->prepare("SELECT `id`, `brand`, `model`, `color`, `construction_year`, `license_plate`, `Price`, `Status` FROM cars");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); //fetch haal dingens op via associative arrys

$clients =$stmt->fetchAll();

//var_dump($clients);

$response = json_encode($clients);
header("Content-type:application/json");
echo $response;







?>