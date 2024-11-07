<?php
require_once("includes/initialize.php");
include 'header.php';
?>
 
<div class="rows">

  <div class="col-12 col-sm-12 col-lg-12">
	<?php

  	 if (isset($_GET['instructorId'])){			
			$instructor = new Instructor();
			$cur = $instructor->single_instructor($_GET['instructorId']);			
		}
	  ?>
 
<form class="form-horizontal span4" action="delete_instructorSubjects.php" method="POST">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Instructor Subjects </h3>
	  </div>
	  <div class="panel-body">
	   <div class="row" >	   
     	 <div class="container">

     	  <div class="well" > 

    	<form class="form-horizontal span4" action="" method="POST">
    		<table align="center" >			 
         	<thead>
			  	<tr id="table" >
			  		<th width="20%" class="bottom">Full Name</th>
			  		<th width="10%" class="bottom">Sex</th>
			 		<th width="20%" class="bottom">Employment Status</th>
			 		<th width="20%" class="bottom">Specialization</th>	
			  		<th width="100%" class="bottom">Address</th>
			  	</tr>	
		    </thead> 
		    <tbody>
		     	<tr>
		     		<td><?php echo (isset($cur)) ? $cur->INST_FULLNAME : 'ID' ;?></td>
		     		<td><?php echo (isset($cur)) ? $cur->INST_SEX  : 'Sex' ;?></td>
		     		<td><?php echo (isset($cur)) ? $cur->EMPLOYMENT_STATUS : 'EMPLOYMENT STATUS' ;?></td>
		     		<td><?php echo (isset($cur)) ? $cur->SPECIALIZATION : 'SPECIALIZATION' ;?></td>
		     		<td><?php echo (isset($cur)) ? $cur->INST_ADDRESS : 'Address' ;?></td>
		     	</tr>
		    </tbody>
		    <tfoot>
			  	<tr><td   colspan="6"></td></tr>
			  	<tr><td  colspan="5" align="Right"></td><td align="center" ></td></tr>
			</tfoot>	   
			  
			</table>
		</form>
	 </div>      		         
   </div>
  </div><!--/span-->
</form>
  
<div class="rows">		  
	<div class="panel-body">
	 <html>		  
	  	<body>
	  		</br>
	  	
		<div class="container">
				<?php
		check_message();
			
		?>
		<div class="well">
		<form class="form-horizontal span4" action="delete_instructorSubjects.php" method="POST">
		    <table class="table table-hover">
				<caption><h3 align="left">Subjects</h3></caption>
				  <thead>
				  	<tr id="table">
				  		<tr>
				  		<th width="20%" class="bottom"> <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Subject Code</th>
				  		<th class="bottom">Description</th>
				  		<th class="bottom">Semester</th>
				 		<th class="bottom">Course</th>
				 		<th class="bottom">Level</th>
				 		<th class="bottom">Pre-requisite</th>
				 		<th align="center" class="bottom">Unit</th>  
				 		<th class="bottom">Days and Time</th>				 		 
				  	</tr>	   
				  </thead>
				  <tbody>
				  	<?php

					 
						$mydb->setQuery("SELECT * 
								FROM  `subject` s,  `course` c  ,class cl
								WHERE s.`COURSE_ID` = c.`COURSE_ID` 
								AND s.`SUBJ_ID`=cl.`SUBJ_ID` 
								AND  `INST_ID` = ".$_GET['instructorId']."");
						$cur = $mydb->loadResultlist();
						foreach ($cur as $result) {

					  		echo '<tr>';

					  		echo '<td width="15%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CLASS_ID. '"/>
				  			'.$result->SUBJ_CODE .'</td>';
					  		echo '<td width="30%">'. $result->SUBJ_DESCRIPTION.'</td>';
					  		echo '<td>'. $result->SEMESTER.'</td>';
					  		echo '<td>'. $result->COURSE_NAME.'</td>';
					  		echo '<td>'. $result->COURSE_LEVEL.'</td>';
							echo '<td>'. $result->PRE_REQUISITE.'</td>';
							echo '<td align="center">'. $result->UNIT.'</td>';
							echo '<td>'. $result->DAY.'/'. $result->C_TIME.'</td>';
						//	echo '<td><a href="#.php?id='.$result->CLASS_ID.'">'. $result->DAY.'/'. $result->C_TIME.'</a></td>';
							echo  '<input type="hidden" name="INST_ID" id="INST_ID" value="'.$result->INST_ID.'"/>';
					  		echo '</tr>';
				  		}
					  	 
				  	?>
				  </tbody>
	  			<tfoot>
				<?php
					$mydb->setQuery("SELECT SUM(UNIT) as UN
						FROM  `subject` s,  `course` c  ,class cl
						WHERE s.`COURSE_ID` = c.`COURSE_ID` 
						AND s.`SUBJ_ID`=cl.`SUBJ_ID` 
						AND  `INST_ID` = ".$_GET['instructorId']."");
					$result = $mydb->loadSingleResult();	 
				  ?>
			  	<tr><td class="bottom"  colspan="7"></td></tr>
			  	<tr><td  colspan="6" align="Right"><Strong>Total</Strong></td><td align="center" ><strong><?php echo $result->UN; ?></strong></td></tr>
				<tr><td  colspan="7"></td></tr>				  	 
				</tfoot>		
			</table>			
				<div class="btn-group">
				  <a href="listofinstructor.php" class="btn btn-default">Back</a>
				   <a href="assignInstructorSubjects.php?instructorId=<?php  echo (isset($_GET['instructorId'])) ? $_GET['instructorId']: 'ID' ; ?>" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span>  Assign Subjects</a>
				   <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
		</form>
			</body>
				</html>		
			  </div>
			</div>
							
			</form>
			<SCRIPT LANGUAGE="JavaScript"> 
			if (window.print) {
			document.write('<form><!--<input type=button name=print value="Print" onClick="window.print()" visible="false">--></form>');
			}
			</script>
            </div><!--/span-->            
        </div><!--End or row-->
      </div>
    </div><!--End or row-->					
</form>				  
</div>
</div>
<?php include("footer.php") ?>



