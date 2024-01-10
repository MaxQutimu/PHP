<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        $nameError = $emailError = "";
        $name = $email = "";

        $formSucces = false;

        // Deze functie haalt onnodige dingen weg
        function check($data){
            $data = trim($data); // Verwijdert onnodige tekens (extra spatie, tab, nieuwe regel)
            $data = stripslashes($data); // Verwijdert backslashes (\) uit de invoergegevens van de gebruiker
            $data = htmlspecialchars($data); // Het verandert speciale characters naar HTML elementen

            return $data;
        }

        // Kijkt naar welke methode
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // Als naam leeg is
            if (empty($_POST["name"])){
                $nameError = "* Name is required";
            } else{
                $name = check($_POST["name"]);
                // Kijkt of de naam rare tekens bevat
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameError = "Only letters and white space allowed";
                }
            }

            // Als email leeg is
            if (empty($_POST["email"])){
                $emailError = "* Email is required";
            } else{
                $email = check($_POST["email"]);
                // Kijkt of de email adres wel klopt
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format";
                }
            }

            if ($nameError == "" and $emailError == ""){
                $formSucces = true;
            }
        }

        if (!$formSucces){
            ?>
            <div>
                <h1>Form</h1>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    Name* <input type="text" name="name" value="<?php echo $name;?>">
                    <span> <?php echo $nameError;?></span>
                    <br><br>
                    Email* <input type="text" name="email" value="<?php echo $email;?>">
                    <span> <?php echo $emailError;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">  
                </form>
            </div>
            <?php
        } else{
            ?>
            <h1>The entered data:</h1>

            Name: <?php echo $name; ?><br>
            Email: <?php echo $email; ?>
            <?php
        }
    ?>
</body>
</html>