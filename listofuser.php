<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			    <form action="delete_user.php" Method="POST">  					
				<table class="table table-hover">
					<caption><h3 align="left">List of User</h3></caption>
				  <thead>
				  	<tr>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 Account Name</th>
				  		<th>Username</th>
				  		<th>Type</th>
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * 
											FROM  `useraccounts`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';

				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ACCOUNT_ID. '"/>
				  				<a href="pagunavailable.php?id='.$result->ACCOUNT_ID.'">' . $result->ACCOUNT_NAME.'</a></td>';
				  		echo '<td>'. $result->ACCOUNT_USERNAME.'</td>';
				  		echo '<td>'. $result->ACCOUNT_TYPE.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				  <tfoot>
				  	<tr><td></td><td></td><td></td></tr>
				  </tfoot>	
				</table>
				<div class="btn-group">
				  <a href="newuser.php" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



