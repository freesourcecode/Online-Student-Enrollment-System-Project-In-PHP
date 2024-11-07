<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php
if (isset($_POST['savecourse'])){

	if ($_POST['coursename'] == "" OR $_POST['coursedesc'] == "") {
		message("All field is required!","error");
		check_message();
	}else{
		

		$course = new Course();
		$coursename   	= $_POST['coursename'];
		$courselevel   	= $_POST['level'];
		$coursemajor   	= $_POST['major'];
		$coursedesc 	= $_POST['coursedesc'];
		$coursedept		= $_POST['dept'];
		$res = $course->find_all_course($coursename, $courselevel, $coursemajor);
				
		if ($res >=1) {
			message("Course name already exist!","error");
			check_message();
		}else{
			$course->COURSE_NAME = $coursename;
			$course->COURSE_LEVEL = $courselevel;
			$course->COURSE_MAJOR = $coursemajor;
			$course->COURSE_DESC = $coursedesc;
			$course->DEPT_ID = $coursedept;	
			 $istrue = $course->create(); 
			 if ($istrue == 1){
			 	
			 	message("New [". $coursename ."] course created successfully!","success");
			 	redirect('listofcourse.php');
			 }
		}	 

		
	}
}

?>		
		
		 
		        <form class="form-horizontal well span6" action="#.php" method="POST">

					<fieldset>
						<legend>New Course</legend>
															

						  <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "coursename">Course Code</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="coursename" name="coursename" placeholder=
													  "Course Code" type="text" value="">
				              </div>
				            </div>
				          </div>

				            <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "level">Course Level</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="level" name="level" placeholder=
													  "Course Level" type="number" value="">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "major">Major</label>

				              <div class="col-md-8">
				                  <select class="form-control input-sm" name="major" id="major">
				                  	<option value="None">None</option>
				                  	<?php
				                  	$major = new Major();
				                  	$cur= $major->listOfmajor();
				                  	foreach ($cur  as $major) {
				                  		echo '<option value='.$major->MAJOR.'>'.$major->MAJOR.'</OPTION>';
				                  	}

				                  	?>
				                  </select>	
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "coursedesc">Course Description</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="coursedesc" name="coursedesc" placeholder=
													  "Course Description" type="text" value="">
				              </div>
				            </div>
				          </div>

						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "dept">Department</label>

				              <div class="col-md-8">
				                  <select class="form-control input-sm" name="dept" id="dept">
				                  	<?php
				                  	$dept = new dept();
				                  	$cur = $dept->listOfDept();	
				                  	foreach ($cur as $Department) {
				                  		echo '<option value="'. $Department->DEPT_ID.'">'.$Department->DEPARTMENT_NAME .'</option>';
				                  	}

				                  	?>
										
									</select>	
				              </div>
				            </div>
				          </div>
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>

				              <div class="col-md-8">
				                <button class="btn btn-default" name="savecourse" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
				              </div>
				            </div>
				          </div>

							
					</fieldset>	

									
				</form>

				</div><!--End of container-->
			

<?php include("footer.php") ?>



