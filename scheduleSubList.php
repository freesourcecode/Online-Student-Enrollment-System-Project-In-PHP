<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			    <form action="delete_subject.php" Method="POST">  					
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
				
					//this is the current page per number ($current_page)	
					$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
									
					//record per Page($per_page)	
					$per_page = 10;
										
					//total count record ($total_count)
					$countEmp = new SubjPagination();
					$total_count = $countEmp->count_allrecords();
					
					$pagination = new SubjPagination($current_page, $per_page, $total_count);
				  	  @$subjcode =  $_GET['subjcode'];
				  	  @$course 	 =  $_GET['course'];
				  	  @$ay		 =  $_GET['ay'];
				  	  @$semester =  $_GET['semester'];
				  	  
				  	  if ($subjcode == '' AND $ay == '' AND $semester == ''){ 
					  		$mydb->setQuery("SELECT * 
											FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID` = c.`COURSE_ID` LIMIT {$pagination->per_page} OFFSET {$pagination->offset()} ");
						  	loadresult();
					  	}else{
					  		$mydb->setQuery("SELECT * 
										FROM  `subject` s,  `course` c
										WHERE s.`COURSE_ID` = c.`COURSE_ID` 
										AND SUBJ_CODE='{$subjcode}' 
										OR c.`COURSE_ID`='{$course}' 
										OR AY='{$ay}'
										OR SEMESTER='{$semester}'");
					  		loadresult();

					  	}

				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';

						  		echo '<td width="15%">' . $result->SUBJ_CODE.'</td>';
						  		echo '<td width="30%">'. $result->SUBJ_DESCRIPTION.'</td>';
						  		echo '<td>'. $result->UNIT.'</td>';
						  		echo '<td>'. $result->PRE_REQUISITE.'</td>';
						  		echo '<td>'. $result->SEMESTER.'</td>';
						  		echo '<td>'. $result->COURSE_NAME.'</td>';
						  		echo '<td>'. $result->COURSE_LEVEL.'</td>';
						  		echo '<td><a href="updateDaysTime.php?id='.$result->SUBJ_ID.'">Update Days and Time</a></td>';
						  		echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				  <tfoot>
				  	<tr><td colspan="7"><?php	echo '<ul class="pager" align="center">';

				  /*	if ($pagination->total_pages() > 1) {
						$last = $page - 2;
						echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li>";
					} else if ($page == 0) {
						echo @"<li><a href=\"$_PHP_SELF?page=$page\"> <li>Next</a></li>";
					} else if ($page > 0) {
						$last = $page - 2;
						echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li> ";
						echo @"<li><a href=\"$_PHP_SELF?page=$page\">Next</a></li>";
					}*/

					if ($pagination->total_pages() > 1){

						echo 'Page ' .$current_page .' of '. $pagination->total_pages();

						if ($current_page == 1 ){
							echo ' <li class="disabled"><a href=listofsubject.php?page='.$pagination->First_page().'>First </a> </li>';
						
						}else{
							echo ' <li ><a href=listofsubject.php?page='.$pagination->First_page().'>First </a> </li>';

						}
						
						if  ($current_page >= 1 ){
							
							echo ' <li> <a href=listofsubject.php?page='.($current_page - 1).'>Previous </a> </li>';

						}else{
							echo ' <li class="disabled"> <a href=listofsubject.php?page='.($current_page - 1).'>Previous </a> </li>';
						}
						
						if ($current_page <  $pagination->total_pages()){
						
							echo ' <li><a href=listofsubject.php?page='.($current_page + 1) .'>Next</a></li> ';
											
						}else{

							echo ' <li class="disabled"><a href=listofsubject.php?page='.($current_page + 1) .'>Next</a></li> ';
						}
						
					
							
						if ($current_page ==  $pagination->total_pages() ){
													
							echo ' <li class="disabled"><a href=listofsubject.php?page='.$pagination->total_pages().'>Last </a> </li>';
						}else{
							echo ' <li><a href=listofsubject.php?page='.$pagination->total_pages().'>Last </a> </li>';
						}
							
					}
					/*				
					if ($pagination->total_pages() > 1){
						//this is for previous record
						if ($pagination->has_previous_page()){
						echo ' <li><a href=listofsubject.php?page='.$pagination->previous_page().'>&laquo; </a> </li>';
						}
						 //it loops to all pages
					 	 for($i = 1; $i <= $pagination->total_pages(); $i++){
							//check if the value of i is set to current page	
							if ($i == $pagination->current_page){
							//then it sset the i to be active or focused
								echo '<li class="active"><span>'. $i.' <span class="sr-only">(current)</span></span></li>';
							 }else {
							 //display the page number
								echo ' <li><a href=listofsubject.php?page='.$i.'> '. $i .' </a></li>';
							 } 
						 }
						//this is for next record		
						if ($pagination->has_next_page()){
						echo ' <li><a href=listofsubject.php?page='.$pagination->next_page().'>&raquo;</a></li> ';
						}
						
					}*/
					?></td></tr>
				  </tfoot>	
				</table>
				<!-- <div class="btn-group">
				  <a href="newsubject.php" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div> -->
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



