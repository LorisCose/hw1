<?php
session_start();    
header('Content-Type: application/json');

//$secret = require 'chaivi_Sp.php';

$clientId = '42ba27e033294298aa9e4889a2f80f3a'; //$secret['client_id'];
$clientSecret = '3b747dfed8e346978699fb9f0f42c1c3'; //$secret['client_secret'];

// Funzione per ottenere un access token
function getAccessToken($clientId, $clientSecret) {
    $url = 'https://accounts.spotify.com/api/token';

    // Creare l'header di autorizzazione
    $headers = [
        'Authorization: Basic ' . base64_encode($clientId . ':' . $clientSecret)
    ];

    // I dati da inviare nel corpo della richiesta
    $data = [
        'grant_type' => 'client_credentials'
    ];

    // Inizializzare cURL
    $ch = curl_init();

    // Impostare le opzioni di cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eseguire la richiesta e ottenere la risposta
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificare la risposta JSON
    $responseData = json_decode($response, true);

    // Restituire l'access token
    return $responseData['access_token'];
}

// Funzione per cercare l'ID di un autore
function getArtistId($accessToken, $artistName) {
    $url = 'https://api.spotify.com/v1/search?q=' . urlencode($artistName) . '&type=artist';

    // Creare l'header di autorizzazione
    $headers = [
        'Authorization: Bearer ' . $accessToken
    ];

    // Inizializzare cURL
    $ch = curl_init();

    // Impostare le opzioni di cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eseguire la richiesta e ottenere la risposta
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificare la risposta JSON
    $responseData = json_decode($response, true);

    // Restituire l'ID del primo autore trovato
    return $responseData['artists']['items'][0]['id'] ?? null;
}

// Funzione per cercare gli album di un autore
function getArtistAlbums($accessToken, $artistId) {
    $url = "https://api.spotify.com/v1/artists/{$artistId}/albums";

    // Creare l'header di autorizzazione
    $headers = [
        'Authorization: Bearer ' . $accessToken
    ];

    // Inizializzare cURL
    $ch = curl_init();

    // Impostare le opzioni di cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eseguire la richiesta e ottenere la risposta
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificare la risposta JSON
    return json_decode($response, true);
}

if (isset($_GET['ricerca'])) {
    $artistName = $_GET['ricerca'];
    $accessToken = getAccessToken($clientId, $clientSecret);
    $artistId = getArtistId($accessToken, $artistName);

    if ($artistId) {
        $albums = getArtistAlbums($accessToken, $artistId);
        echo json_encode(['albums' => $albums]);
    } else {
        echo json_encode(['error' => 'Autore non trovato']);
    }
}
?>