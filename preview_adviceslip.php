<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<style type="text/css">
body { 
background-image: url(); 
background-repeat: no-repeat; 
height: 100%; 
width: 100%; 
background-position: bottom; 
} 
.top {
    border-top:thin solid;
    border-color:black;
}

.bottom {
    border-bottom:thin solid;
    border-color:black;
}

.left {
    border-left:thin solid;
    border-color:black;
}

.right {
    border-right:thin solid;
    border-color:black;
}
.header-row { position:fixed; top:0; left:0; }
.table {padding-top:5px; }
</style>


	<?php
		  				$Schoolyr = new Schoolyr();
						$sy = $Schoolyr->single_sy($_GET['txtsearch']);
						$course = new Course();
						$studcourse = $course->single_course($sy->COURSE_ID);
					

					$student = new Student();
					$cur = $student->single_student($_GET['txtsearch']);

					
				
		

  ?>
				
			<div class="rows">
		  
            <div class="col-10 col-sm-10 col-lg-10">
            

					<div class="panel panel-primary">
					  
					  <div class="panel-body">
					  	<html>
					  
					  	<body>
					    <table>
				         	<thead>
							  	<tr id="table">
							  		<th align="left">ID Number</th>
							  		<th align="left">Name</th>
							  		<th align="left">Status</th>
							 		<th align="left">AY</th>
							 		<th align="left">Semester</th>
							 		<th align="left">Course</th>
							  		
				
							  	</tr>	
						    </thead> 
						     <tbody>
						     	<tr>
						     		<td><?php echo (isset($cur)) ? $cur->IDNO : 'ID' ;?></td>
						     		<td><?php echo (isset($cur)) ? $cur->LNAME.', '.$cur->FNAME : 'Fullname' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->STATUS : 'STATUS' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->AY : 'STATUS' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->SEMESTER : 'COURSE' ;?></td>
						     		<td><?php echo (isset($studcourse)) ? $studcourse->COURSE_NAME .' - '.$studcourse->COURSE_LEVEL.$studcourse->COURSE_MAJOR : 'COURSE' ;?></td>
						     	</tr>
						      </tbody>
						       <tfoot>
				  	
							  	<tr><td   colspan="7"></td></tr>
							  	<tr><td  colspan="6" align="Right"></td><td align="center" ></td></tr>
							  </tfoot>	   
					    	<table>
					
				           </table>
					    	<table>
					<caption><h3 align="left">Adviced Subjects</h3></caption>
				  <thead>
				  	<tr id="table">
				  		<th width="20%" class="bottom" align="left">Subject Code</th>
				  		<th width="30%" class="bottom" align="left">Description</th>
				  		<th width="10%" class="bottom" align="left">Semester</th>
				 		<th width="10%" class="bottom" align="left">Course</th>
				 		<th width="10%" class="bottom" align="left">Level</th>
				 		<th width="10%" class="bottom" align="left">Pre-requisite</th>
				 		<th width="10%" align="center" class="bottom">Unit</th>
				  		
	
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  	 $cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
					  		$mydb->setQuery("SELECT * 
											FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID` = c.`COURSE_ID`
											AND s.`COURSE_ID` =".$cid . " AND SEMESTER='First'");
					
				  			$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';

						  		echo '<td width="15%">'.$result->SUBJ_CODE .'</td>';
						  		echo '<td width="30%">'. $result->SUBJ_DESCRIPTION.'</td>';
						  		echo '<td>'. $result->SEMESTER.'</td>';
						  		echo '<td>'. $result->COURSE_NAME.'</td>';
						  		echo '<td>'. $result->COURSE_LEVEL.'</td>';
  								echo '<td>'. $result->PRE_REQUISITE.'</td>';
  								echo '<td align="center">'. $result->UNIT.'</td>';
						
						  		echo '</tr>';
					  		}
					  	 
				  	?>
				  </tbody>
				  <tfoot>
				  		<?php
				  	 $cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
					$mydb->setQuery("SELECT SUM(UNIT) as UN
											FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID` = c.`COURSE_ID`
											AND s.`COURSE_ID` =".$cid . " AND SEMESTER='First'");
					  		$result = $mydb->loadSingleResult();
							
							
					  	 
				  	?>
				  	<tr><td class="bottom"  colspan="7"></td></tr>
				  	<tr><td colspan="2">Date Printed:  <? print(Date("l F d, Y")); ?></td><td  colspan="4" align="Right"><Strong>Total</Strong></td><td align="center" ><strong><?php echo $result->UN; ?></strong></td></tr>
				  	<tr><td  colspan="7"></td></tr>
				  	<tr><td colspan="2"></td><td colspan="2">Advised and signed by:</td><td ></td></tr>
				  </tfoot>	
				</table>
			
					
						
						</body>
						</html>		
					  </div>
					</div>
						
			

            </div><!--/span-->
            
        </div><!--End or row-->

