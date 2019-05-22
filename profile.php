<?php
	include_once 'cmn/dbh.cmn.php';
	include_once 'header.php';

	if (!isset($_SESSION['uid'])){
    header("Location: index.php");
    die();
}
?>

<div class="col-md-9" id="hometxt">
	<div class="d-flex justify-content-center">
		
			<h2>Jouw profiel</h2>         
	</div>
		<br>
		<div class="d-flex justify-content-center">
 			<div class="col-md-5" id="profile-card">
 				<hr>
 				<p>
 					Naam: 
 				<br>
 					<?php echo $_SESSION['fName'];?> <?php echo $_SESSION['lName'];?>
 				</p>
 				<p>
 					Gebruikersnaam: 
 				<br>
 					<?php echo $_SESSION['username'];?>
 				</p>
 				<p>
 					E-mail: 
 				<br>
 					<?php echo $_SESSION['mail'];?>
 				</p>
 				<div class="d-flex justify-content-end">
 				<a href="editprofile.php" id="aLink">Bewerken</a>
 			</div>
 			</div>
 		</div>
</div>

<?php 
	include_once 'footer.php';
?>