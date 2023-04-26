<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozpiska</title>
	<style>
		body{
			text-align:center;
			align-items:center;
		}
	</style>
</head>
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

echo "Connected successfully";
?>

<body>
	<br>
	<a href='index.php'><button>Strona główna</button></a>
	<h2>Dodaj nowy aromat</h2>
	<form method="POST" action="dodaj_aromat.php">
		<label for="nazwa">Nazwa aromatu:</label>
		<input type="text" id="nazwa" name="nazwa" required><br><br>
		<label for="ilosc">Ilość butelek aromatu:</label>
		<input type="number" id="ilosc" name="ilosc" required><br><br>
		<input type="submit" value="Dodaj">
	</form>


	<?php
	// obsługa usuwania wartości
	if (isset($_POST['delete_id'])) {
		$delete_id = $_POST['delete_id'];
		$sql_update = "UPDATE aromaty SET ilosc = ilosc - 60 WHERE nazwa='$delete_id'";
        


if (mysqli_query($conn, $sql_update)) {
    echo "Wartość została zmniejszona o 1";
} else {
    echo "Błąd aktualizacji wartości: " . mysqli_error($conn);
}

	}
if (isset($_POST['delete_id1'])) {
		$delete_id = $_POST['delete_id1'];
		$sql_delete = "DELETE FROM aromaty WHERE nazwa='$delete_id'";

		if (mysqli_query($conn, $sql_delete)) {
		    echo "Aromat został usunięty";
		} else {
		    echo "Błąd usuwania aromatu: " . mysqli_error($conn);
		}
	}
     
	// zapytanie SQL do pobrania wszystkich rekordów z tabeli "aromaty"
	$sql = "SELECT * FROM aromaty WHERE ilosc>0";

	// wykonanie zapytania
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// wyświetlenie tabeli z wynikami
		echo "<table>";
		echo "<tr><th>Nazwa</th><th>Ilość</th><th>Akcje</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["nazwa"] . "</td><td>" . $row["ilosc"] . "ml" . "</td>";
			echo "<td><form method='POST' action=''><input type='hidden' name='delete_id' value='" . $row["nazwa"] . "'><input type='submit' value='Zmniejsz o 60ml'></form></td>";
                        echo "<td><form method='POST' action=''><input type='hidden' name='delete_id1' value='" . $row["nazwa"] . "'><input type='submit' value='Usun'></form></td></tr>";
		}
		echo "</table>";
                
	} else {
		echo "Brak wyników";
	}
	
	mysqli_close($conn);
	?>
</body>
</html>
