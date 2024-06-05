<?php

if(isset($_GET["id"])){
    // Connessione al database
    $conn = mysqli_connect("localhost", "root", "", "test");
    // Inizializza array di eventi
    $prod = array();
    
    $id_categoria = mysqli_real_escape_string($conn, $_GET["id"]);
    $query = "SELECT id, nome, immagine, prezzo FROM prodotti WHERE categoria = '".$id_categoria."' ORDER BY id";
    $res = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($res))
      {
        $img = base64_encode($row['immagine']);      //questo serve a fare l'encode dell'immagine poiché messa in BLOB (formato)
        unset($row['immagine']);         //per l'ascolto di un nuovo encode

        $row['immagine'] = $img;   //aggiungi ogni immagine del prodotto alla var $img

        $prod[] = $row;
      }
    }

      // Chiudi
      mysqli_free_result($res);
      mysqli_close($conn);
      // Ritorna
      echo json_encode($prod);


?>