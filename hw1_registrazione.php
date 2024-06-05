<?php

    // Avvia la sessione
    session_start();
    
    // Verifica l'esistenza di dati POST
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["password"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "test");
        // Escape dell'input
        $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);




        $query1 = "SELECT * FROM users WHERE email = '".$email."'";
        $res1 = mysqli_query($conn, $query1);

        if(mysqli_num_rows($res1) > 0)
        {
             // Flag di errore
             $errore = true;
        
        }
        else
        {
            
        $query2 = "INSERT INTO users (nome,email,password) VALUES ('".$nome."','".$email."','".$password."')";
        $res = mysqli_query($conn, $query2);
        $_SESSION["email"] = $_POST["email"];
        // Vai alla pagina home_db.php
        header("Location: index.php");
        exit;

        }

    }

?>


<html>
<head>

    <link rel="stylesheet" href="registrazione.css">
    <script src='registrazione.js' defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Registrazione</title>
</head>
<body>
    <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "<strong> Mail già utilizzata. </strong>";
                echo "</p>";
            }
    ?>

    <header>

    <div id="contenitore_alert" class="nascosto">
            <div id="alert_form">

                <img src="media/icon_warning.svg">
                <em>Compilare tutti i campi per procedere.</em>

            </div>
        </div>

        <div id="contenitore_registrazione">
            
            
            <div id="contenitore_scritte">

                <img src="media/Google_logo.png">
                <h1>Benvenuto</h1>
                <p>Crea il tuo Account Google</p>

            </div>

            <div id="contenitore_form">
                <form  method="post" action='hw1_registrazione.php' name='form_login' id='form_login'>
                    <input type="text" name="nome" placeholder="Inserisci il tuo nome" id="nome">

                    <input type="text" name="email" placeholder="Inserisci la tua e-mail" id="email">
                    <div id="alert_mail" class="nascosto"><em class="alert_validazione">Formato mail sbagliato.</em></div>
                    
                    <input type="password" name='password' placeholder="Inserisci la tua password" id="password">
                    <div id="alert_lung_pass" class="nascosto"><em class="alert_validazione">La password deve essere lunga almeno 6 caratteri.</em></div>
                    <div id="alert_upper_pass" class="nascosto"><em class="alert_validazione">La password deve contenere almeno una lettera maiuscola e un numero.</em></div>
                    
                    <input type="submit" value="Avanti" id="invia">
                </form>
            </div>


        </div>

    
    </header>
    
</body>
</html>