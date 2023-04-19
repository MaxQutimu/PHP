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

$brand = $_GET['brand'];
$model = $_GET['model'];
$color = $_GET['color'];
$construction_year = $_GET['construction_year'];
$license_plate = $_GET['license_plate'];
$Price = $_GET['Price'];
$Status = $_GET['Status'];



$stmt = $conn->prepare("INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `construction_year`, `license_plate`, `Price`, `Status`) VALUES (NULL, '$brand', '$model', '$color', '$construction_year', '$license_plate', '$Price', '$Status')");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); //fetch haal dingens op via associative arrys

$clients =$stmt->fetchAll();

//var_dump($clients);


header("Location: cars.html");
$response = 'OK';
echo $response;







?>