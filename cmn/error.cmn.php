<?php

// ====================== Error message lege velden ======================
	if(isset($_GET['errorEmpty'])){
		?><div class="errorText"><?php echo $_GET['errorEmpty']; ?></div><?php
	}
// ====================== Error als wachtwoord 1 en 2 niet overeen komen ======================
	if(isset($_GET['errorPassword'])){
		?><div class="errorText"><?php echo $_GET['errorPassword']; ?></div><?php
	}
	// ====================== Error als wachtwoord 1 en 2 niet overeen komen ======================
	if(isset($_GET['errorPasswordChar'])){
		?><div class="errorText"><?php echo $_GET['errorPasswordChar']; ?></div><?php
	}
// ====================== Error verkeerde karakters ======================
	if(isset($_GET['errorChar'])){
		?><div class="errorText"><?php echo $_GET['errorChar']; ?></div><?php
	}
// ====================== Error ongeldige email ======================
	if(isset($_GET['errorMail'])){
		?><div class="errorText"><?php echo $_GET['errorMail']; ?></div><?php
	}
// ====================== Error gebruikersnaam al in bezit ======================
	if(isset($_GET['errorTaken'])){
		?><div class="errorText"><?php echo $_GET['errorTaken']; ?></div><?php
	}
// ====================== succes inloggen/toevoegen ======================
	if(isset($_GET['succes'])){
		?><div class="succesText"><?php echo $_GET['succes']; ?></div><?php
	}
	// ====================== Error verkeerde inloggegevens ======================
	if(isset($_GET['wrong'])){
		?><div class="errorText"><?php echo $_GET['wrong']; ?></div><?php
	}
?>