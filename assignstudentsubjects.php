<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
 	
		<div class="rows">
		  <div class="col-md-3">
		  
		  </div>

		  <div class="col-md-6">
		  <form class="form-horizontal span4" action="" method="POST">

					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Query Options</h3>
					  </div>
					  <div class="panel-body">

					    <div class="form-group" id="subjcode">
				            <div class="col-md-10">
				              <label class="col-md-4 control-label" for=
				              "subjcode">Subject Code:</label>

				              <div class="col-md-8">
				            
				                 <input class="form-control input-sm" id="subjcode" name="subjcode" placeholder=
												  "Subject Code" type="text" value="">
				              </div>

				            </div>
				          </div>
				  			<div class="form-group" id="course">
				            <div class="col-md-10">
				             <label class="col-md-4 control-label" for=
				                "course">Course:</label>

				                <div class="col-md-8">
				                 <select class="form-control input-sm" name="course" id="course">
				                 	<option value="Select Course">Select Course</option>
				                  	<?php
				                  	$course = new Course();
				                  	$cur = $course->listOfcourse();	
				                  	foreach ($cur as $course) {				                  		 
				                  		echo '<option value="'. $course->COURSE_ID.'">'.$course->COURSE_NAME . ' ' .$course->COURSE_LEVEL.'</option>';
				                  	}

				                  	?>
										
									</select>	
				                </div>

				            </div>

				          </div>
				          <div class="form-group" id="ay">
				            <div class="col-md-10">
				               <label class="col-md-4 control-label" for=
				                "ay">AY:</label>

				                <div class="col-md-8">
				                  <input class="form-control input-sm" id="ay" name="ay" type=
				                  "text" placeholder="Academic Year">
				                </div>

				            </div>

				          </div>
				           <div class="form-group" id="semester">
				            <div class="col-md-10">
				               <label class="col-md-4 control-label" for=
				                "semester">Semester:</label>

				                <div class="col-md-8">
				                  <input class="form-control input-sm" id="semester" name="semester" type=
				                  "text" placeholder="Semester">
				                </div>

				            </div>

				          </div>

						<div class="form-group" id="subjcode">
				            <div class="col-md-10">
				               <label class="col-md-4 control-label"></label>

				                <div class="col-md-8">
							         <div class="btn-group">
									    <button type="submit" name="search" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
									    <button type="Reset" name="search" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
									    				  
									</div>
				                </div>

				            </div>

				          </div>

					  </div>
					</div>
									
				</form>
		  </div>
		   
		</div>		
			
</div><!--End of container-->
			

<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			    <form action="p_studentsubjects.php?studentId=<?php echo $_GET['studentId']; ?>&SY=<?php echo $_GET['SY']; ?>" Method="POST">  					
				<table class="table table-hover">
					<caption><h3 align="left">List of Subject</h3></caption>
				  <thead>
				  	<tr>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 Subject Code</th>
				  		<th>Description</th>
				  		<th>Unit</th>
				  		<th>Pre-requisite</th>
				  		<th>Semester</th>
				 		<th>Course</th>
				 		<th>Level</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  		global $mydb;
				  		$studentId=$_GET['studentId'];
				
					//this is the current page per number ($current_page)	
					$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
									
					//record per Page($per_page)	
					$per_page = 5;
										
					//total count record ($total_count)
					$countEmp = new SubjPagination();
					$total_count = $countEmp->count_allrecords();
					
					$pagination = new SubjPagination($current_page, $per_page, $total_count);
				  	  @$subjcode =  $_POST['subjcode'];
				  	  @$course 	 =  $_POST['course'];
				  	  @$ay		 =  $_POST['ay'];
				  	  @$semester =  $_POST['semester'];

				  	  If (isset($_POST['search'])){
				  	  	
				  	  	if ($subjcode == '' AND $ay == '' AND $semester == '' AND $course=='Select Course'  ){ 

				  	  		$mydb->setQuery("SELECT  * 
					  						FROM  `subject` s,  `course` c, grades g
											WHERE s.`COURSE_ID`= c.`COURSE_ID` AND s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}' 
											LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");
							loadresult();
					  		$mydb->setQuery("SELECT  * 
					  						FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID`= c.`COURSE_ID` AND s.`SUBJ_CODE` 
											NOT IN (SELECT  `SUBJ_CODE` 
					  						FROM  `subject` s,  grades g
											WHERE  s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}') 
											LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");

				  	 //  		$mydb->setQuery("SELECT  * 
								// FROM  `subject` s ,`course` c , `class` cl, `instructor` i
								// WHERE  s.`COURSE_ID`=c.`COURSE_ID` AND s.`SUBJ_ID`=cl.`SUBJ_ID` 
								// AND cl.`INST_ID`=i.`INST_ID`
								// LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");	 
						  	loadresult();
					  	}else{
					  		$mydb->setQuery("SELECT  * 
					  						FROM  `subject` s,  `course` c, grades g
											WHERE s.`COURSE_ID`= c.`COURSE_ID` AND s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}' 
											AND (SUBJ_CODE='{$subjcode}' 
											OR c.`COURSE_ID`='{$course}' 
											OR AY='{$ay}'
											OR SEMESTER='{$semester}')");
							loadresult();
					  		$mydb->setQuery("SELECT * 
										FROM  `subject` s ,`course` c 
										WHERE  s.`COURSE_ID`=c.`COURSE_ID` 
										AND s.`SUBJ_CODE` 
											NOT IN (SELECT  `SUBJ_CODE` 
					  						FROM  `subject` s,  grades g
											WHERE  s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}') 
										AND (SUBJ_CODE='{$subjcode}' 
										OR c.`COURSE_ID`='{$course}' 
										OR AY='{$ay}'
										OR SEMESTER='{$semester}')");
					  		loadresult();					  	
					  	}
					  }else{
					  $mydb->setQuery("SELECT  * 
					  						FROM  `subject` s,  `course` c, grades g
											WHERE s.`COURSE_ID`= c.`COURSE_ID` AND s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}' 
											LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");
							loadresult();
					  		$mydb->setQuery("SELECT  * 
					  						FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID`= c.`COURSE_ID` AND s.`SUBJ_CODE` 
											NOT IN (SELECT  `SUBJ_CODE` 
					  						FROM  `subject` s,  grades g
											WHERE  s.`SUBJ_ID`=g.`SUBJ_ID` 
											AND g.`IDNO`='{$studentId}') 
											LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");
					  	// $mydb->setQuery("SELECT  * 
								// FROM  `subject` s ,`course` c , `class` cl, `instructor` i 
								// WHERE  s.`COURSE_ID`=c.`COURSE_ID` AND s.`SUBJ_ID`=cl.`SUBJ_ID` 
								// AND cl.`INST_ID`=i.`INST_ID` 
								// LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");
						  	loadresult();
					  }

				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
							if(isset($result->GRADE_ID)){
								$status = 'Already Added';
								$select = '<td width="15%"><input type="checkbox" name="selector[]" id="selector[]" disabled CHECKED="CHECKED" value=""/>
						  				 ' . $result->SUBJ_CODE.'</td>';
							}else{

								$status = 'None';
								$select = '<td width="15%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->SUBJ_ID. '"/>
						  				 ' . $result->SUBJ_CODE.'</td>';
							}
						  		echo '<tr>';
						  		echo $select;
						  		// echo '<td width="15%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->SUBJ_ID. '"/>
						  		// 		 ' . $result->SUBJ_CODE.'</td>';
						  		echo '<td width="30%">'. $result->SUBJ_DESCRIPTION.'</td>';
						  		echo '<td>'. $result->UNIT.'</td>';
						  		echo '<td>'. $result->PRE_REQUISITE.'</td>';
						  		echo '<td>'. $result->SEMESTER.'</td>';
						  		echo '<td>'. $result->COURSE_NAME.'</td>';
						  		echo '<td>'. $result->COURSE_LEVEL.'</td>';
						  		echo '<td>'.$status.'</td>';
						  		echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				  <tfoot>
				  	<tr><td colspan="7"><?php	echo '<ul class="pager" align="center">';
 
					if ($pagination->total_pages() > 1){

						echo 'Page ' .$current_page .' of '. $pagination->total_pages();

						if ($current_page == 1 ){
							echo ' <li class="disabled"><a href=?studentId='.$studentId.'&page='.$pagination->First_page().'>First </a> </li>';
						
						}else{
							echo ' <li ><a href=?studentId='.$studentId.'&page='.$pagination->First_page().'>First </a> </li>';

						}
						
						if  ($current_page >= 1 ){
							
							echo ' <li> <a href=?studentId='.$studentId.'&page='.($current_page - 1).'>Previous </a> </li>';

						}else{
							echo ' <li class="disabled"> <a href=?studentId='.$studentId.'&page='.($current_page - 1).'>Previous </a> </li>';
						}
						
						if ($current_page <  $pagination->total_pages()){
						
							echo ' <li><a href=?studentId='.$studentId.'&page='.($current_page + 1) .'>Next</a></li> ';
											
						}else{

							echo ' <li class="disabled"><a href=?studentId='.$studentId.'&page='.($current_page + 1) .'>Next</a></li> ';
						}
						
					
							
						if ($current_page ==  $pagination->total_pages() ){
													
							echo ' <li class="disabled"><a href=?studentId='.$studentId.'&page='.$pagination->total_pages().'>Last </a> </li>';
						}else{
							echo ' <li><a href=?studentId='.$studentId.'&page='.$pagination->total_pages().'>Last </a> </li>';
						}
							
					}
					 
					?></td></tr>
				  </tfoot>	
				</table>
				<div class="btn-group">
				  <a href="studentsubjects.php?studentId=<?php echo (isset($studentId)) ? $studentId : 'ID' ;?>" class="btn btn-default"><span class="glyphicon glyphicon-back"></span>Back</a>
				  <button type="submit" class="btn btn-default" name="Add"><span class="glyphicon glyphicon-plus-sign"></span>Assign Selected</button>
				</div>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



