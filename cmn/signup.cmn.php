<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.cmn.php';

	//variabelen van inputs op het registratie form
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$fName = mysqli_real_escape_string($conn, $_POST['name']);
	$lName = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$passRpt = mysqli_real_escape_string($conn, $_POST['passrpt']);

	//controleert op lege velden
	if (empty($username) || empty($fName) || empty($lName) || empty($email) || empty($pass)) {
		$errorEmpty = urlencode("lege velden");
		header ("Location: ../signup.php?errorEmpty=".$errorEmpty);
		exit();
	} else {
		//controleert op juiste karakters
		if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$errorChar = urlencode("onjuiste karakters");
			header ("Location: ../signup.php?errorChar=".$errorChar);
			exit();
		}
		//controleert wachtwoord bevestigen
		else if ($pass !== $passRpt){
			$errorPassword = urlencode("Wachtwoorden komen niet overeen");
			header("Location: ../signup.php?errorPassword=".$errorPassword);
			exit();

		} else if (strlen($pass) < 8 ){
			$errorPasswordChar = urlencode("Wachtwoord moet minsten 8 karakters hebben");
			header("Location: ../signup.php?errorPasswordChar=".$errorPasswordChar);
			exit();

		} else {
			//controleert of email juist is ingevoerd
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errorMail = urlencode("geen geldige e-mail");
				header ("Location: ../signup.php?errorMail=".$errorMail);
				exit();
			} 
			//controleert of gebruikersnaam al bestaat
			else {
				$sql = "SELECT * FROM users WHERE gebruikersnaam='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					$errorTaken = urlencode("Gebruikersnaam al bezet");
					header ("Location: ../signup.php?errorTaken=".$errorTaken);
					exit();
				} else {
					//hashed het wachtwoord
					$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
					//insert de data van de gebruiker in de database
					$sql = "INSERT INTO users (gebruikersnaam, voornaam, achternaam, email, wachtwoord) VALUES ('$username', '$fName', '$lName', '$email', '$hashedPass');";
					mysqli_query($conn, $sql);
					$succes = urlencode("gebruiker succesvol aangemaakt!");
					header ("Location: ../signup.php?succes=".$succes);
					exit();
				}
			}
		}
	}


} else {
	header ("Location: ../signup.php");
	exit();
}