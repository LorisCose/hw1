<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION["email"])) {
    // Connessione al database
    $conn = mysqli_connect("localhost", "root", "", "test");

    if (!$conn) {
        echo json_encode(['error' => 'connessione al database fallita']);
        exit;
    }

    // Inizializza array di eventi
    $cart = array();
    $utente = mysqli_real_escape_string($conn, $_SESSION["email"]);
    $query = "SELECT prodotti.id, prodotti.nome, prodotti.immagine, prodotti.prezzo 
                FROM prodotti JOIN carrello ON prodotti.id = carrello.id_prodotto WHERE carrello.utente = '$utente'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $img = base64_encode($row['immagine']); // Encode dell'immagine poiché in formato BLOB
            unset($row['immagine']); // Rimuovi l'immagine originale

            $row['immagine'] = $img; // Aggiungi l'immagine codificata
            $cart[] = $row;
        }
        mysqli_free_result($res);
    } else {
        echo json_encode(['error' => 'Query failed']);
        mysqli_close($conn);
        exit;
    }

    mysqli_close($conn);
    // Ritorna il carrello come JSON
    echo json_encode($cart);
} else {
    echo json_encode(['error' => 'Effettuare il login']);
}
?>
