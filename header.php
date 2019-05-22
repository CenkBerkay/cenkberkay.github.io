<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow"	/>
	<title>login system</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	
	<header>
		<div class="sidebar">
			<div id="container">
				<a href="/"><img src="/img/logo.png" style="width:175px;"></a>
			</div>
			<nav>
				<ul>
					<div class="navCon">
						<li><a href="/" id="aLink"><img src="/img/home.png" id="icon"> Home</a></li>
					<?php
						// als de gebruiker is ingelogd zal dit gebeuren
						if (isset($_SESSION['uid'])) {
							echo 	'<li><a href="/logbook" id="aLink"><img src="/img/form.png" id="icon"> Logboek</a></li>
									 <li><a href="/profile" id="aLink"><img src="/img/avatar.png" id="icon"> Profiel</a></li>					 
							</ul>
							</div>
									<form action="cmn/logout.cmn.php" method="POST">
										<button class="btn btn-default fa fa-sign-out-alt" id="logoutBut" type="submit" name="submit"></button>
									</form>';
						}
					?>	
				</nav>
		</div>
		<div id="header">
 			<p>.</p>
		</div>
	</header><!-- /header -->
</body>