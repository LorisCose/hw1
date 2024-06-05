<?php

    // Avvia la sessione
    session_start();
    // Verifica l'accesso
    if(isset($_SESSION["email"]))
    {
        // Vai alla home
        header("Location: index.php");
        exit;
    }
    // Verifica l'esistenza di dati POST
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "test");
        // Escape dell'input
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        // Cerca utenti con quelle credenziali
        $query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
        $res = mysqli_query($conn, $query);
        // Verifica la correttezza delle credenziali
        if(mysqli_num_rows($res) > 0)
        {
            $row=$res->fetch_assoc();
            $nome=$row["nome"];
            // Imposta la variabile di sessione
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $_POST["email"];
            // Vai alla pagina home_db.php
            header("Location: index.php");
            exit;
        }
        else
        {
            // Flag di errore
            $errore = true;
        }
    }

?>


<html>
<head>

    <link rel="stylesheet" href="hw1_login.css">
    <script src='hw1_login.js' defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "<strong> Credenziali sbagliate. Riprova. </strong>";
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

        <div id="contenitore_login">
            
            
            <div id="contenitore_scritte">

                <img src="media/Google_logo.png">
                <h1>Accedi</h1>
                <p>Utilizza il tuo Account Google</p>

            </div>

            <div id="contenitore_form">
                <form  method="post" name='form_login' action='hw1_login.php' id='form_login'>
                    <input type="text" name="email" placeholder="Inserisci la tua e-mail" id="email">
                    <input type="password" name='password' placeholder="Inserisci la tua password" id="password">
                    <input type="submit" value="Avanti" id="invia">
                </form>
                <a href="hw1_registrazione.php">Prima volta, crea subito un account!</a>
            </div>


        </div>

    
    </header>
    
</body>
</html>