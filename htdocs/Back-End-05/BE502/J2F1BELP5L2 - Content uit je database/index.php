<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>J2F1BELP5L2 - Content uit je database</title>
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"
</head>
<body>

	<!-- laad hier via php je header in (vanuit je includes map) -->
	<?php
      include "includes/header.php";
  	?>

	<!-- Haal hier uit de URL welke pagina uit het menu is opgevraagd. Gebruik deze om de content uit de database te halen. -->
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "databank_php";

		$conn = new mysqli($servername, $username, $password, $dbname);

	
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


	?>	
	<!-- Laat hier de content die je op hebt gehaald uit de database zien op de pagina. -->
	<?php
	if(isset($_GET['subject'])) {
		$id = $_GET['subject'];
		$id = mysqli_real_escape_string($conn, $id); //  escapes any special characters 

		$sql = "SELECT * FROM onderwerpen WHERE id = '$id'";  // Fetch data from database
		$result = $conn->query($sql);

		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) { //  fetch a row from a database query as an associative array (retrieves one row of data from the result set and returns it as an associative array aka holds data in pairs)
				echo "
					<div class='wrapper'>
						<img src='images/{$row['image']}' alt=pic>
						<div class='text'>
							<h1>{$row['name']}</h1>
							<p>{$row['description']}</p>
						</div>
					</div>";

			}
		} else {
			echo "No data found.";
		}
	} else {
		echo "homepage!";
	}
	?>
	<!-- laad hier via php je footer in (vanuit je includes map)-->
	<?php
      include "includes/footer.php";
  ?>

</body>
</html>