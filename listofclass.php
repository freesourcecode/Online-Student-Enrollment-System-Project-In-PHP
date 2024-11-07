<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			    <form action="#.php" Method="POST">  					
				<table class="table table-hover">
					<caption><h3 align="left">List of Class</h3></caption>
				  <thead>
				  	<tr class="table">
				  	<tr>
				  		<th> Class Code</th>
				  		<th>Instructor</th> 
				  		<th>Days And Time</th> 
				  		<th>Students</th>
				 	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  		global $mydb;
				
				

				 	$mydb->setQuery("SELECT * 
							FROM  `instructor` i,  `class` c
							WHERE i.`INST_ID` = c.`INST_ID` ");
					 	loadresult();


				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';

						  		echo '<td> ' . $result->CLASS_CODE.' </td>';
						  		echo '<td>'. $result->INST_FULLNAME.'</td>';
						  		echo '<td><a href="updateDaysTime.php?classId='.$result->CLASS_ID.'">'. $result->DAY.' /'. $result->C_TIME.'</a></td>';  
						  		echo '<td><a href="instructorClasses.php?classId='.$result->CLASS_ID.'">View List</a></td>';
						  	 	echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				  <tfoot>
				  	<tr><td colspan="7"><?php	echo '<ul class="pager" align="center">';
 
					?></td></tr>
				  </tfoot>	
				</table>
				<!-- <div class="btn-group">
				  <a href="#.php" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div> -->
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



