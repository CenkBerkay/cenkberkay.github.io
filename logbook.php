<?php 
	include_once 'cmn/dbh.cmn.php';
	include_once 'header.php';
 ?>

<?php  
// kan alleen bereikt worden door ingelogde gebruikers
	if (!isset($_SESSION['uid']))
{
    header("Location: index.php");
    die();
}
?>

 		<div class="d-flex justify-content-center">
 			<div class="col-md-5" id="log-card">
				<h2>Logboek</h2>
				<form class="" action="cmn/logbook.cmn.php" method="POST">
					<textarea class="form-control spacing" rows="6" maxlength="255" type="text" name="log" placeholder="Wat heb je vandaag gedaan?"></textarea>
					<input class="form-control col-md-4 spacing" type="number" name="hours" placeholder="Gewerkte uren">
					<button class="btn btn-light" type="submit" name="submit">Opsturen</button>
					<?php include 'cmn/error.cmn.php'; ?>
				</form>
			</div>
		</div>

		<div class="d-flex justify-content-center">
			<?php

				$id = $_SESSION['uid'];

			    $sql = "SELECT * FROM logbook WHERE userid='$id' ORDER BY datum DESC";
			    $result = mysqli_query($conn, $sql);

			?><div class="col-md-5" id="log-card">
			    <table class="table">
			    	<h2>Logs</h2>
			    	<br>
			        <thead>
			            <tr>
			                <th scope="col">Datum/tijd (Y-M-D)</th>
			                <th scope="col">Aantal uren</th>
			                <th scope="col">Toelichting</th>
			            </tr>
			        </thead>
			    </div>
			<?php
			    if($result)
			    {
			        foreach($result as $row)
			        {
			?>
			        <tbody>
			            <tr>    
			         <?php   
							  
						?>                      
			                <td> <?php echo $row['datum']; ?> </td>                       
			                <td> <?php echo $row['uren']; ?> </td>     
			                <td><textarea class="form-control" rows="3" readonly><?php echo $row['toelichting']; ?></textarea> </td>                                                   
			            </tr>
			        </tbody>
			<?php           
			        }
			    }
			    else 
			    {
			        echo "Geen medewerkers";
			    }
			?>
			    </table>
			</div>
<!-- script voor uren niet meer dan 12 en niet minder dan 1 -->
<script>
	$('input').on('input', function () {
	    
	    var value = $(this).val();
	    
	    if ((value !== '') && (value.indexOf('.') === -1)) {
	        
	        $(this).val(Math.max(Math.min(value, 12), 1));
	    }
	});
</script>

<?php 
	include_once 'footer.php';
?>