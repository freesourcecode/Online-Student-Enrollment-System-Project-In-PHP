<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php
if (isset($_POST['search'])){

	redirect('scheduleSubList.php?subjcode='. $_POST['subjcode'].'&course='.$_POST['course'].'&semester='.$_POST['semester'].'&ay='.$_POST['ay']);
			
}

?>		
		<div class="rows">
		  <div class="col-md-3">
		  
		  </div>

		  <div class="col-md-6">
		  <form class="form-horizontal span4" action="#.php" method="POST">

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
				                  	<?php
				                  	$course = new Course();
				                  	$cur = $course->listOfcourse();	
				                  	foreach ($cur as $course) {
				                  		echo '<option value="'. $course->COURSE_ID.'">'.$course->COURSE_NAME .'</option>';
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
									    <a href="newsubject.php" name="add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</a>
									  						  
									</div>
				                </div>

				            </div>

				          </div>

					  </div>
					</div>
									
				</form>
		  </div>
		    <div class="col-md-3">
		  
		  </div>

		</div>		
			
</div><!--End of container-->
			

<?php include("footer.php") ?>



