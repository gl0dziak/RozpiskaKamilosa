<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Panel logowania</title>
	<style>
		body{
			text-align:center;
			align-items:center;
                        font-size:50px;
		}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 32px 48px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
                
	</style>
</head>
<body>
	<h1>Panel logowania</h1>
	<form method="POST" action="">
		<label for="login">Login:</label>
		<input type="text" id="login" name="login" required><br><br>
		<label for="password">Hasło:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Zaloguj">
	</form>

	<?php 
	if(isset($_POST["login"]) && isset($_POST["password"])){
		if($_POST["login"] == "kamilos" && $_POST["password"] == "admin1312"){
			session_start();
			$_SESSION["login"] = "kamilos";
			header("Location: admin.php");
			exit;
		} else {
			header("Location: index.php");
			exit;
		}
	}
	?>
</body>
</html>
