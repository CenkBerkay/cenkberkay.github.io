<?php 
	include_once 'header.php';
	include_once 'cmn/dbh.cmn.php';
	

if (!isset($_SESSION['uid'])){
	header("Location: ../index.php");
	die();
}
?>
<div class="col-md-9" id="hometxt">
	<div class="d-flex justify-content-center">
		<h2>Profiel bewerken</h2>         
	</div>
		<br>
		<div class="d-flex justify-content-center">
 			<div class="col-md-6" id="profile-card">
				<form action="/cmn/editprofile.cmn.php" method="POST">
					<label>Gebruikersnaam</label>
					<p class="spacing"><?php echo $_SESSION['username']?></p>
					<label>Voornaam</label>
					<input class="form-control spacing" type="text" name="name" value="<?php echo $_SESSION['fName']?>">
					<label>Achternaam</label>
					<input class="form-control spacing" type="text" name="lastname" value="<?php echo $_SESSION['lName']?>">
					<label>E-mail</label>
					<input class="form-control spacing" type="text" name="email" value="<?php echo $_SESSION['mail']?>"><br>
					<button class="btn btn-light" type="submit" name="submit">Bijwerken</button>
					<?php include 'cmn/error.cmn.php'; ?>
				</form>
			</div>
		</div>
</div>

<?php 
	include_once 'footer.php';
?>