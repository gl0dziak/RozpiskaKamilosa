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

// pobranie wartości z formularza
$nazwa = $_POST['nazwa'];
$ilosc = $_POST['ilosc'];

// sprawdzenie, czy wpis z taką samą nazwą już istnieje w tabeli
$sql_check = "SELECT * FROM aromaty WHERE nazwa='$nazwa'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    // jeśli istnieje, to zaktualizuj wartość ilości
    $sql_update = "UPDATE aromaty SET ilosc = (ilosc + $ilosc)*120 WHERE nazwa='$nazwa'";
    if (mysqli_query($conn, $sql_update)) {
        header("location: admin.php");
    } else {
        echo "Błąd aktualizacji wartości: " . mysqli_error($conn);
    }
} else {
    // jeśli nie istnieje, to dodaj nowy wpis
    $sql_insert = "INSERT INTO aromaty (nazwa, ilosc) VALUES ('$nazwa', $ilosc*120)";
    if (mysqli_query($conn, $sql_insert)) {
        header("location: admin.php");
    } else {
        echo "Błąd dodawania nowego wpisu: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
