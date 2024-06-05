<?php

session_start();
// Verifica dati GET
if(isset($_SESSION["email"]))
{
      // Connessione al database
      $conn = mysqli_connect("localhost", "root", "", "test");

      if (!$conn) {
            // Reindirizza a carrello.php in caso di errore di connessione
            header("Location: carrello.php");
            exit;
        }

      $utente = $_SESSION["email"];
     
      
      mysqli_query($conn, "DELETE  FROM carrello WHERE utente = '$utente'");
      // Chiudi connessione
      // mysqli_close($conn);
      header("Location: pagamento_avvenuto.php");
      exit;
}

?>