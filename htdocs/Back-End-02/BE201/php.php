<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=back-end-02", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];

    try {
        $stmt = $conn->prepare("INSERT INTO `be201` (`Name`, `Email`) VALUES (:Name, :Email)");
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        // Fetch the inserted data
        $stmt = $conn->prepare("SELECT * FROM `be201` WHERE `Name` = :Name");
        $stmt->bindParam(':Name', $Name);
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Encode the result as JSON and send it back to the JavaScript
        header("Content-type:application/json");
        echo json_encode($result);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
