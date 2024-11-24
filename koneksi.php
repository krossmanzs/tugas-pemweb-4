<?php
$host = 'localhost';
$username = 'root'; 
$password = '';     
$database = 'form_pendaftaran';

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("<h1>Koneksi gagal: " . $conn->connect_error . "</h1>");
}
?>
