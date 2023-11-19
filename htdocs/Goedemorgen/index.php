<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<style>
    body{
        margin-top: 20%;
        text-align: center;
        font-size: 50px;
    }
    p{
        font-size: 50px;
    }
</style>

<body>
    
    <?php
    // $hour = "23";
    $date = date("H:i");
    $hour = date("H");

    if ($hour > 6 and $hour < 12){
        echo "Goede morgen! <br>";
        echo "Het is nu $date";
        echo "<body style='background-image: url(images/morning.png)'>";
    } elseif ($hour > 12 and $hour < 18){
        echo "Goede middag! <br>";
        echo "Het is nu $date";
        echo "<body style='background-image: url(images/afternoon.png)'>";
    } elseif ($hour > 18 and $hour < 24){
        echo "Goede avond! <br>";
        echo "Het is nu $date";
        echo "<body style='background-image: url(images/evening.png)'>";
    } elseif ($hour > 24 and $hour < 6){
        echo "Goede nacht! <br>";
        echo "Het is nu $date";
        echo "<body style='background-image: url(images/night.png)'>";
    }



    ?>

</body>
</html>