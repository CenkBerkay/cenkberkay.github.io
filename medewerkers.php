<?php
	include_once 'cmn/dbh.cmn.php';
	include_once 'header.php';
?>
<div class="container">

	<?php

	    $sql = "SELECT * FROM users";
	    $result = mysqli_query($conn, $sql);
	?>
	    <table class="table">
	        <thead>
	            <tr>
	                <th scope="col"> ID</th>
	                <th scope="col">Voornaam</th>
	                <th scope="col">Achternaam</th>
	                <th scope="col">Email</th>
	            </tr>
	        </thead>
	<?php
	    if($result){
	        foreach($result as $row){
	?>
	        <tbody>
	            <tr>
	                <td> <?php echo $row['id']; ?> </td>                            
	                <td> <?php echo $row['voornaam']; ?> </td>                            
	                <td> <?php echo $row['achternaam']; ?> </td>                            
	                <td> <?php echo $row['email']; ?> </td>                                                       
	                <td> 
	            </tr>
	        </tbody>
	<?php           
	        }
	    }
	    else {
	        echo "Geen medewerkers";
	    }
	?>
	    </table>
</div>

<?php 
	include_once 'footer.php';
?>