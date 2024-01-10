<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    require "variable.php";

    echo $fullName;

    foreach($fruits as $fruit){
        echo "<br>";
        echo $fruit;
        echo "<br>";
    }

    ?>

</body>
</html>