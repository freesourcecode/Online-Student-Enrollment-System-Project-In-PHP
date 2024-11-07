<?php
require_once("includes/initialize.php");
include 'header.php';
?>
 
<div class="rows">

  <div class="col-12 col-sm-12 col-lg-12">
	<?php
		  	 if (isset($_GET['studentId'])){
				if ($_GET['studentId']==""){
					message("ID Number is required!","error");
					check_message();
					
				}else{

					
					$Schoolyr = new Schoolyr();
					$NumberofResult = $Schoolyr->findsy($_GET['studentId']);
					if ($NumberofResult == 0){
						// message("This Student is advice to go back from step 1!","error");
						// check_message();
 						redirect("enrollment.php?studentId=".$_GET['studentId']);


					}else{

						$sy = $Schoolyr->single_sy($_GET['studentId']);
						$course = new Course();
						$studcourse = $course->single_course($sy->COURSE_ID);
						//the button in assigning the subjects.
						$button ='<a href = "assignstudentsubjects.php?studentId='.$_GET['studentId'].'&SY='.$sy->AY.'" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>Assign Subject</a>
						 <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>';

					}

					$student = new Student();
					$cur = $student->single_student($_GET['studentId']);

				}
			}

  ?>
     
		  <!-- <form class="form-horizontal span4" action="#.php" method="POST"> -->
					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Enrolled Subjects by the Student </h3>
					  </div>
					  <div class="panel-body">
					   <div class="row">      	  		            		          
			           <div class="container">
				 		<div class="well">
					    <form class="form-horizontal span4" action="#.php" method="POST">
				           <table align="center"> 
				           	<thead>
							  	<tr id="table">
							  		<th width="15%"  class="bottom">ID Number</th>
							  		<th width="20%"  class="bottom">Name</th>
							  		<th width="15%"  class="bottom">Status</th>
							 		<th width="15%"  class="bottom">AY</th>
							 		<th width="15%"  class="bottom">Semester</th>
							 		<th width="100%" class="bottom">Course</th>
							  		
				
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
					     </table>
					     </form>
					    </div>	
					   </div>				            	              
			          </div>				          
			         </div><!--/span-->
			    <!--  </form> -->
			    <div class="rows">					  
				<div class="panel-body">
				<html>					  
				<body>
				<div class="container">
					<?php
					check_message();
						
					?>
				 <div class="well">
				<form class="form-horizontal span4" action="delete_studentSubjects.php?studentId=<?php echo $_GET['studentId']; ?>" method="POST">					    
				  <table class="table table-hover">
					<caption><h3 align="left">Subjects</h3><hr/></caption>
					  <thead>
					  	<tr id="table">

					  		<th width="20%" class="bottom"> <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Subject Code</th>
					  		<th class="bottom">Description</th>
					  		<th class="bottom">Semester</th>
					 		<th class="bottom">Course</th>
					 		<th class="bottom">Level</th>
					 		<th class="bottom">Pre-requisite</th>
					 		<th align="center" class="bottom">Unit</th>
					  		
		
					  	</tr>	   
					  </thead>
					  <tbody>
					  	<?php
				 			$cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
						  		$mydb->setQuery("SELECT * 
												FROM  `subject` s,  `course` c ,`grades` g
												WHERE s.`COURSE_ID` = c.`COURSE_ID` AND s.`SUBJ_ID`=g.`SUBJ_ID` 
												AND  `IDNO` = ".$_GET['studentId']."");
						
					  			$cur = $mydb->loadResultlist();
								foreach ($cur as $result) {
							  		echo '<tr>';

							  		echo '<td width="15%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->GRADE_ID. '"/>
						  			'.$result->SUBJ_CODE .'</td>';
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

 

					  	// $cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
						$mydb->setQuery("SELECT SUM(UNIT) as UN
												FROM  `subject` s,  `course` c,`grades` g 
												WHERE s.`COURSE_ID` = c.`COURSE_ID`  
												AND s.`SUBJ_ID` = g.`SUBJ_ID` 
												AND  g.`IDNO` = ".$_GET['studentId']."");
						  		$result = $mydb->loadSingleResult();	 
					  	?>
					  	<tr><td class="bottom"  colspan="7"></td></tr>
					  	<tr><td  colspan="6" align="Right"><Strong>Total</Strong></td><td align="center" ><strong><?php echo $result->UN; ?></strong></td></tr>
						<tr><td  colspan="7"></td></tr>
					  <!-- 	<tr><td colspan="2">Date Printed:  <? //print(Date("l F d, Y")); ?> .</td><td colspan="2">Advised and signed by:</td><td ></td></tr>  -->
					  </tfoot>	
					</table>
						<div class="btn-group">
						<a href="listofstudent.php" class="btn btn-default">  Back</a>
						<?php echo (isset($button)) ? $button : ''; ?>
			 				<!-- <a href = "assignstudentsubjects.php?studentId=<?php // echo (isset($_GET['studentId'])) ? $_GET['studentId'] : 'ID' ; ?>" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>Assign Subject</a> -->
					  <!--  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button> -->
					</form>
						</body>
						</html>		
					  </div>
					</div>
									
				</form>
			 <SCRIPT LANGUAGE="JavaScript"> 
			// if (window.print) {
			// document.write('<form><!--<input type=button name=print value="Print" onClick="window.print()" visible="false">--></form>');
			// }
		 </script>

            </div><!--/span-->
            
        </div><!--End or row-->
          
</div>

			        </div><!--End or row-->
									
				</form>
				  
		  </div>

		</div>

		   
            
			

<?php include("footer.php") ?>



