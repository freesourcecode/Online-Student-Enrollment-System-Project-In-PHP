<?php
require_once("includes/initialize.php");
include 'header.php';

?>

<div class="container">	
	<?php

  	 if (isset($_GET['classId'])){			
			$mydb->setQuery("SELECT * 
								FROM  `subject` s,  `course` c  ,class cl
								WHERE s.`COURSE_ID` = c.`COURSE_ID` 
								AND s.`SUBJ_ID`=cl.`SUBJ_ID` 
								AND  `CLASS_ID` = ".$_GET['classId']."");
			$cur = $mydb->loadSingleResult();		
		}
	  ?>
<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Instructor Class </h3>
	  </div>
	  <div class="panel-body">
	   <div class="row" >
	   <div class="container">	
		<div class="well">
			  
    	<form class="form-horizontal span4" action="" method="POST">
    		<table class="table" align="center" >	 
    		<caption><h3 align="left">Subject</h3></caption>
				<thead>
			  	<tr id="table" >
				  	<tr>
				  		<th>Subject Code</th>
				  		<th>Description</th>
				  		<th>Semester</th>  
				 		<th>Course</th>
				 		<th>Level</th>
				 		<th>Days And Time</th>
				  	</tr>	
				  </thead>
				  <tbody>				    
			     	<tr>
			     		<td><?php echo (isset($cur)) ? $cur->SUBJ_CODE : 'Code' ;?></td>
			     		<td><?php echo (isset($cur)) ? $cur->SUBJ_DESCRIPTION  : 'Description' ;?></td>
			     		<td><?php echo (isset($cur)) ? $cur->SEMESTER : 'Semester' ;?></td>
			     		<td><?php echo (isset($cur)) ? $cur->COURSE_NAME : 'Course' ;?></td>
			     		<td><?php echo (isset($cur)) ? $cur->COURSE_LEVEL : 'Level' ;?></td>
			     		<td><?php echo (isset($cur)) ? $cur->DAY . ' ' .$cur->C_TIME : 'DaysTime' ;?></td>
			     	 
			     	</tr>
		    	</tbody>
		    </table>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->
<div class="container">
	<?php
		check_message();
	?>
		<div class="well">
			    <form action="" Method="POST">  					
				<table class="table table-hover">
					<caption><h3 align="left">List of Student</h3></caption>
				  <thead>
				  	<tr id="table" >
				  		<tr>
				  		<th> <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> ID#.</th>
				  		<th>Fullname</th>
				  		<th>Gender</th>
				  		<th>Age</th>
				  		<th>Birth Date</th>
				  		<th>Status</th>
				  		<th>Prelim</th>
				  		<th>Midterm</th>
				  		<th>Final</th>
				  		<th>Average</th>
				  		<th>Remarks</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 

				  	global $mydb;
				
					// //this is the current page per number ($current_page)	
					// $current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
									
					// //record per Page($per_page)	
					// $per_page = 5;
										
					// //total count record ($total_count)
					// $countEmp = new StudPagination();
					// $total_count = $countEmp->count_allrecords();
					
					// $pagination = new StudPagination($current_page, $per_page, $total_count);

				  	  // @$idno =  $_GET['idno'];
				  	  // @$lname =  $_GET['lname'];
				  	  // @$fname =  $_GET['fname'];

				  	//   if ($idno == '' AND $lname=='' AND $fname == ''){
				  	//   	$mydb->setQuery("SELECT  `IDNO` , CONCAT(  `LNAME` ,  ' ',  `FNAME` ,  ' ',  `MNAME` ) AS  'Name',
				  	// 					  `SEX` ,`AGE`, `BDAY` ,  `STATUS` ,  `EMAIL`
				  	// 					  FROM  `tblstudent` LIMIT {$pagination->per_page} OFFSET {$pagination->offset()}");
				  	//   	loadresult();

				  	//   }else{
							// $mydb->setQuery("SELECT  `IDNO` , CONCAT(  `LNAME` ,  ' ',  `FNAME` ,  ' ',  `MNAME` ) AS  'Name',
				  	// 					  `SEX` ,`AGE`, `BDAY` ,  `STATUS` ,  `EMAIL`
							// 				FROM  `tblstudent` 
							// 				WHERE  `IDNO` ='". $idno."' OR  `LNAME` = '". $lname ."'	OR  `FNAME` =  '". $fname ."' 
							// 				LIMIT {$pagination->per_page} OFFSET {$pagination->offset()}");	

							// loadresult();	
				  	//   }

				  		$mydb->setQuery(" SELECT * 
										FROM  `class` c, `grades` g,  `tblstudent` s
										WHERE c.`SUBJ_ID` = g.`SUBJ_ID` 
										AND g.`IDNO` = s.`IDNO` AND CLASS_ID='".$_GET['classId']."'");
				  		loadresult();
				  	
				  		function loadresult(){
				  			global $mydb;
					  		$cur = $mydb->loadResultList();
							foreach ($cur as $student) {
					  		echo '<tr>';

					  		// echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$student->IDNO. '"/>
					  		// 		<a href="edit_studentinfo.php?id='.$student->IDNO.'">' . $student->IDNO.'</a></td>';
					  		echo '<td>' . $student->IDNO.'</td>';
					  		echo '<td>'. $student->LNAME. ',' .$student->FNAME.' '.$student->MNAME.'</td>';
					  		echo '<td>'. $student->SEX.'</td>';
					  		echo '<td>'. $student->AGE.'</td>';
					  		echo '<td>'. $student->BDAY.'</td>';
					  		echo '<td>'. $student->STATUS.'</td>';
					  		echo '<td><a href="studentgrades.php?classId='.$_GET['classId'].'&gradeId='.$student->GRADE_ID.'">'. $student->PRE.'</a></td>';
					  		echo '<td><a href="studentgrades.php?classId='.$_GET['classId'].'&gradeId='.$student->GRADE_ID.'">'. $student->MID.'</a></td>';
					  		echo '<td><a href="studentgrades.php?classId='.$_GET['classId'].'&gradeId='.$student->GRADE_ID.'">'. $student->FIN.'</a></td>';
					  		echo '<td>'. $student->FIN_AVE.'</td>';  
					  		echo '<td>'. $student->REMARKS.'</td>';  
					  		echo '</tr>';
					  		}

				  		} 
				  	
				  	?>


				  </tbody>
				  <tfoot>
				  	<tr><td colspan="7">
				  		<?php	//echo '<ul class="pagination" align="center">';
									
					// if ($pagination->total_pages() > 1){
					// 	//this is for previous record
					// 	if ($pagination->has_previous_page()){
					// 	echo ' <li><a href=listofstudent.php?page='.$pagination->previous_page().'>&laquo; </a> </li>';
					// 	}
					// 	 //it loops to all pages
					//  	 for($i = 1; $i <= $pagination->total_pages(); $i++){
					// 		//check if the value of i is set to current page	
					// 		if ($i == $pagination->current_page){
					// 		//then it sset the i to be active or focused
					// 			echo '<li class="active"><span>'. $i.' <span class="sr-only">(current)</span></span></li>';
					// 		 }else {
					// 		 //display the page number
					// 			echo ' <li><a href=listofstudent.php?page='.$i.'> '. $i .' </a></li>';
					// 		 } 
					// 	 }
					// 	//this is for next record		
					// 	if ($pagination->has_next_page()){
					// 	echo ' <li><a href=listofstudent.php?page='.$pagination->next_page().'>&raquo;</a></li> ';
					// 	}
						
					// }
					?>
				</td>
			</tr>
				  </tfoot>	
				</table>
				<div class="btn-group">
				  <a href="listofclass.php" class="btn btn-default">Back</a>
				  <!--  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button> -->
				</div>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->
</div>
</div>
</div>
</div>
<?php include("footer.php") ?>



