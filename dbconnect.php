<?php
// dane do połączenia z bazą danych
$servername = "localhost";
$username = "nazwa_uzytkownika";
$password = "haslo";
$dbname = "lq";

// utworzenie połączenia z bazą danych
$conn = mysqli_connect($servername, $username, $password, $dbname);

// sprawdzenie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
