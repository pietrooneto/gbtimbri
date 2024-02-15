<?php

$host = 'localhost'; 
$dbUser = 'root'; 
$dbPassword = ''; 
$dbName = 'gbtimbri';


$mysqli = new mysqli($host, $dbUser, $dbPassword, $dbName);


if ($mysqli->connect_error) {
    die("Connessione fallita: " . $mysqli->connect_error);
}


// Connessione al database
include 'db_connection.php'; // Assicurati di avere un file che gestisce la connessione al DB

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // Query per ottenere l'immagine BLOB
    $query = "SELECT foto_profilo FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($foto_profilo);
        $stmt->fetch();
        
        // Invia l'intestazione corretta per l'immagine
        header("Content-Type: image/jpg"); // Assumi che il BLOB sia un JPEG, modifica se necessario
        echo $foto_profilo;
    }
    $stmt->close();
}

$conn->close();
?>
