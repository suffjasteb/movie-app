<?php

require_once __DIR__ . '/../config.php'; // Import API key

// Fungsi untuk mengambil data dari OMDB API
function fetchData($query) {
    $url = "http://www.omdbapi.com/?apikey=" . api_key . "&" . $query;
    $response = file_get_contents($url); //  // Mengambil data dari API dalam format JSON
    return json_decode($response, true); // Mengubah JSON menjadi array asosiatif
}

// fungi untuk mencari film berdasarkan judul
function searchMovies($title) {
    return fetchData("s" . urlencode($title)); // Memanggil fetchData() dengan parameter pencarian judul
} 

// Fungsi untuk mendapatkan detail film berdasarkan ID
function getDeatilMovie($id) {
    return fetchData("i=". urlencode($id));
} 
?>