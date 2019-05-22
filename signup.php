<?php 
	include_once 'header.php';
 ?>

 	<body id="bg">
 		<div class="d-flex justify-content-center">
 			<div class="col-md-4" id="reg-card">
				<h2>Registratie</h2><br>
				<form action="cmn/signup.cmn.php" method="POST">
					<label>Gebruikersnaam</label>
					<input class="form-control spacing" type="text" name="username" placeholder="Gebruikersnaam">
					<label>Voornaam</label>
					<input class="form-control spacing" type="text" name="name" placeholder="Voornaam">
					<label>Achternaam</label>
					<input class="form-control spacing" type="text" name="lastname" placeholder="Achternaam">
					<label>E-mail</label>
					<input class="form-control spacing" type="text" name="email" placeholder="E-mail">
					<label>Wachtwoord</label>
					<input class="form-control spacing" type="password" name="pass" placeholder="Wachtwoord">
					<label>Wachtwoord bevestigen</label>
					<input class="form-control spacing" type="password" name="passrpt" placeholder="Wachtwoord bevestigen"><br>
					<button class="btn btn-light"  type="submit" name="submit">Registreer</button>
				</form>
				<?php 
					include 'cmn/error.cmn.php';
				?>
			</div>
		</div>
	</body>
<?php 
	include_once 'footer.php';
?>
