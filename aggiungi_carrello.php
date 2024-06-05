<?php

    // Avvia la sessione
    session_start();
    // Verifica l'accesso
    if(!isset($_SESSION["email"]))
    {
        // Vai al login
        header("Location: hw1_login.php");
        exit;
    }
    // Verifica l'esistenza di dati POST
    if(isset($_GET["id_prod"]) && isset($_GET["prezzo"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "test");
        // Escape dell'input
        $utente = $_SESSION["email"];
        $id_prod = $_GET["id_prod"];
        $prezzo = $_GET["prezzo"];
        
        // Cerca utenti con quelle credenziali
        $query = "INSERT INTO carrello (utente,id_prodotto,prezzo) VALUES ('".$utente."','".$id_prod."','".$prezzo."')";
        $res = mysqli_query($conn, $query);
        
        mysqli_close($conn);
        header("Location: index.php");

        exit;
    }

?>