<?php
require_once("includes/initialize.php");
include 'header.php';


?>
<div class="container">
			
<?php
	$courseid = $_GET['id'];
	$singledept = new Course();
	$object = $singledept->single_course($courseid);


	if (isset($_POST['savecourse'])){

		if ($_POST['coursename'] == "" OR $_POST['coursedesc'] == "") {
			
			message("All field is required!", "error");

		}else{
			$course = new Course();
			$courseid		= $_GET['id'];
			$coursename   	= $_POST['coursename'];
			$courselevel   	= $_POST['level'];
			$coursemajor   	= $_POST['major'];
			$coursedesc 	= $_POST['coursedesc'];
			$coursedept		= $_POST['dept'];
					
			$course->COURSE_NAME = $coursename;
			$course->COURSE_LEVEL = $courselevel;
			$course->COURSE_MAJOR = $coursemajor;
			$course->COURSE_DESC = $coursedesc;
			$course->DEPT_ID 	 = $coursedept;	
			$course->update($courseid);
			

			message($coursename. " has updated successfully!", "info");
			redirect('listofcourse.php');

		}
	}

			

?>

			  <form class="form-horizontal well span6" action="editCourse.php?id=<?php echo $courseid;?>" method="POST">

					<fieldset>
						<legend>New Course</legend>
															

							<div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "coursename">Course Code</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="coursename" name="coursename" placeholder=
													  "Course Code" type="text" value="<?php echo $object->COURSE_NAME;?>">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "level">Course Level</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="level" name="level" placeholder=
													  "Course Level" type="number" value="<?php echo $object->COURSE_LEVEL;?>">
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
													  "Course Description" type="text" value="<?php echo $object->COURSE_DESC;?>">
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
				                <button class="btn btn-primary" name="savecourse" type="submit" >Save</button>
				              </div>
				            </div>
				          </div>

							
					</fieldset>	
					
				</form>
			
				</div><!--End of container-->
			

<?php include("footer.php") ?>



