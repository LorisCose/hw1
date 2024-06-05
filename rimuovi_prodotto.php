<?php

    session_start();
      // Verifica dati GET
      if(isset($_GET["id_prod"]) && isset($_SESSION["email"]))
      {
            // Connessione al database
            $conn = mysqli_connect("localhost", "root", "", "test");
            $utente = $_SESSION["email"];
            $id_prod = $_GET["id_prod"];
            // Elimina evento
            
            mysqli_query($conn, "DELETE FROM carrello WHERE utente = '$utente' AND id_prodotto = '$id_prod' ");
            // Chiudi connessione
            mysqli_close($conn);
            header("Location: carrello.php");
      }

?>