<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozpiska</title>
    <link rel="stylesheet" href="images/style.css">
</head>
<body>
    <div class="elo">
    <a href="login.php"><button>Panel</button></a>
    <h1 style="text-align:center;">60ml albo 120ml</h1>
</div>
<?php
// dane do połączenia z bazą danych
$servername = "localhost";
$username = "gl0dziak";
$password = "K@mil0s1";
$dbname = "rozpiskakamilosa";

// utworzenie połączenia z bazą danych
$conn = mysqli_connect($servername, $username, $password, $dbname);

// sprawdzenie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// zapytanie SQL do pobrania wszystkich rekordów z tabeli "aromaty"
$sql = "SELECT * FROM aromaty WHERE ilosc>0";

// wykonanie zapytania
$result = mysqli_query($conn, $sql);

// sprawdzenie, czy zapytanie zwróciło wynik
if (mysqli_num_rows($result) > 0) {
    // wyświetlenie tabeli z wynikami
    echo "<table>";
    echo "<tr><th>Nazwa</th><th>Ilość</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo  "</td><td>" . $row["nazwa"] . "</td><td>" . $row["ilosc"] . "ml" ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak wyników";
}

mysqli_close($conn);
?><div class="s">
</div>
</body>
</html>
	