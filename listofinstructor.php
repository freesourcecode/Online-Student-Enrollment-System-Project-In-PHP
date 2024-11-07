<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			    <form action="delete_instructor.php" Method="POST">  					
				<table class="table table-hover">
					<caption><h3 align="left">List of Faculty</h3></caption>
				  <thead>
				  	<tr>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 Fullname</th>
				  		<th>Address</th>
				  		<th>Gender</th>
				  		<th>Civil Status</th>
				  		<th>Specialization</th>
				 		<th>Email Address</th>
				 		<th></th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  	  @$FullName = $_GET['FullName'] ;
				  	?>
				  	<?php

				  	if ($FullName ==''){
				  		$instructor = new Instructor();
			  	  		$instructor->listOfinstructor();
				  		loadresult();
				  	}else{
				  			$mydb->setQuery("SELECT * 
							FROM   instructor
							WHERE  `INST_FULLNAME` LIKE '%".$FullName."%'");
							loadresult();
						}
				  	  		

				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';

						  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->INST_ID. '"/>
						  				<a href="editinstructor.php?id='.$result->INST_ID.'">' . $result->INST_FULLNAME.'</a></td>';
						  		echo '<td>'. $result->INST_ADDRESS.'</td>';
						  		echo '<td>'. $result->INST_SEX.'</td>';
						  		echo '<td>'. $result->INST_STATUS.'</td>';
						  		echo '<td>'. $result->SPECIALIZATION.'</td>';
						  		echo '<td>'. $result->INST_EMAIL.'</td>';
					 			echo '<td><a href="instructorSubjects.php?instructorId='.$result->INST_ID.'">List of Loads</a></td>';
						  		
						  		
						  		echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				  <tfoot>
				  	<tr><td></td><td></td><td></td></tr>
				  </tfoot>	
				</table>
				<div class="btn-group">
				  <a href="newfaculty.php" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



