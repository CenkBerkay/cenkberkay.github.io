<?php 

session_start();

//gebruiker kan hier alleen terecht komen als diegene op login heeft geklikt
if (isset($_POST['submit-login'])) {

	include 'dbh.cmn.php';

	//variabelen voor de inputs van het login form
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);

	//controleert of er geen lege velden zijn
	if (empty($username) || empty($pass)) {
		$errorEmpty = urlencode("Lege velden");
		header("Location: ../index.php?errorEmpty=".$errorEmpty);
		exit();
	} 
	//controleert of er iemand is met deze naam, zo niet ga terug
	else {
		$sql = "SELECT * FROM users WHERE gebruikersnaam='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			$wrong = urlencode("verkeerde inloggegevens");
			header("Location: ../index.php?wrong=".$wrong);
			exit();
		} 
		//controleert of de wachtwoorden overeen komen met een boolean als er niemand is geeft de functie false terug 
		//als de functie true terug geeft, word de gebruiker ingelogd
		else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPassCheck = password_verify($pass, $row['wachtwoord']);
				if ($hashedPassCheck == false) {
					$wrong = urlencode("verkeerde inloggegevens");
					header("Location: ../index.php?wrong=".$wrong);
					exit();
					
				} else if ($hashedPassCheck == true) {
					$_SESSION['uid'] = $row['id'];
					$_SESSION['username'] = $row['gebruikersnaam'];
					$_SESSION['fName'] = $row['voornaam'];
					$_SESSION['lName'] = $row['achternaam'];
					$_SESSION['mail'] = $row['email'];
					header("Location: /");
					exit();
				}
			}
		}
	}
 // als de functie niets terug geeft, ga dan terug
} else {
	header("Location: ../index.php");
	exit();
}

