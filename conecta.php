<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";


$conn = new mysqli('localhost', 'root', '', 'cadastro');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
