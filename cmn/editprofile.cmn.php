<?php
session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.cmn.php';

	//variabelen van inputs
	$id = $_SESSION['uid'];
	$fName = mysqli_real_escape_string($conn, $_POST['name']);
	$lName = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	//controleert op lege velden
	if (empty($fName) || empty($lName) || empty($email)) {
		$errorEmpty = urlencode("lege velden");
		header ("Location: ../editprofile.php?errorEmpty=".$errorEmpty);
		exit();
	} else {
		//controleert op juiste karakters
		if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
			$errorChar = urlencode("onjuiste karakters");
			header ("Location: ../editprofile.php?errorChar=".$errorChar);
			exit();
		} else {
			//controleert of email juist is ingevoerd
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errorMail = urlencode("geen geldige e-mail");
				header ("Location: ../editprofile.php?errorMail=".$errorMail);
				exit();
			} else {
				//werkt de data van de gebruiker in de database bij
				$sql = "UPDATE users SET voornaam='$fName', achternaam='$lName', email='$email' WHERE id='$id'";
				mysqli_query($conn, $sql);
				header ("refresh:3; url= /");
				echo '<font color="green">Uw gegevens zijn succesvol gewijzigd.';
				session_destroy();
				exit();
			}
		}
	}

} else {
	header ("Location: ../index.php");
	exit();
}