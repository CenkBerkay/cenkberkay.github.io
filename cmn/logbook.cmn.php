<?php

session_start();
	
if (isset($_POST['submit'])) {

	include_once 'dbh.cmn.php';

	//variabelen van de inputs 
	$id = $_SESSION['uid'];
	$logbook = mysqli_real_escape_string($conn, $_POST['log']);
	$hours = mysqli_real_escape_string($conn, $_POST['hours']);

	//controleert op lege velden
	if(empty($logbook) || empty($hours)){
		$errorEmpty = urlencode("lege velden");
		header ("Location: ../logbook.php?errorEmpty=".$errorEmpty);
		exit();
	}
	//zet de data in de database
	else{
		$sql = "INSERT INTO logbook (uren, toelichting, userid) VALUES ('$hours', '$logbook','$id');";
		mysqli_query($conn, $sql);
		$succes = urlencode("log succesvol toegevoegd");
		header ("Location: ../logbook.php?succes=".$succes);
		exit();
	}
} else {
	header("Location: ../logbook.php");
	exit();
} 