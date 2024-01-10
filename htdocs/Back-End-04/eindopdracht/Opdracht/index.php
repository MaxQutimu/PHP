<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab 2 - Includes en require</title>
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

  <?php
      // laad hier via php je header in (vanuit je includes map)
      include "includes/header.php";
  ?>

  <div class="container">
    <?php

    // laad hier via php de juiste contentpagina in (vanuit de pages map) in. Welke geselecteerd moet worden kun je uit de URL halen (URL_Params).
    if (isset($_GET["subject"])) {
      if ($_GET["subject"] == "1") {
        include "pages/onderwerp1.php";
      } else if ($_GET["subject"] == "2") {
        include "pages/onderwerp2.php";
      } else if ($_GET["subject"] == "3") {
        include "pages/onderwerp3.php";
      } else if ($_GET["subject"] == "4") {
        include "pages/onderwerp4.php";
      }
    } else {
      include "home.php";
    }

    ?>
  </div>
  
  <?php
      // laad hier via php je footer in (vanuit je includes map)
      include "includes/footer.php";
  ?>
</body>
</html>