<?php
require_once("includes/initialize.php");
include 'header.php';

?>


<div class="rows">

  <div class="col-12 col-sm-12 col-lg-12">
	<?php
		  	 if (isset($_POST['search'])){
				if ($_POST['txtsearch']==""){
					message("ID Number is required!","error");
					check_message();

				}else{
					$student = new Student();
					$cur = $student->single_student($_POST['txtsearch']);
				}
			}
			if (isset($_POST['savestep1'])){

 				 $created =  strftime("%Y-%m-%d %H:%M:%S", time()); 
				 $idno  =  $_POST['idno'];
				 $Status = $_POST['Status'];
				 $course = $_POST['course'];
				 $ay 	 = $_POST['ay'];
				 $Semester = $_POST['Semester'];
				
				$sy = new Schoolyr();
				$sy->AY = $ay;
				$sy->SEMESTER = $Semester;
				$sy->COURSE_ID = $course;
				$sy->IDNO = $idno;
				$sy->DATE_RESERVED = $created;
				
				 $istrue = $sy->create();
			 if ($istrue == 1){
			 	
			 	message("Reservation save successfully!","success");
			 	check_message();
		
			 }



			}
			  ?>
  <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"> Student ID Number:</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  
    <form class="navbar-form navbar-left" action="newenrollment.php" method="POST">
      <div class="form-group">
        <input type="text" name="txtsearch" class="form-control" placeholder="Search">
      </div>
      <button type="submit" name="search"class="btn btn-default">  <span class="glyphicon glyphicon-search"></span></button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php
       $created =  strftime("%Y-%m-%d %H:%M:%S", time()); 


      echo date_toText($created); ?></a></li>
      <li class="dropdown">
       
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

		  <form class="form-horizontal span4" action="#.php" method="POST">

					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Enrollment Reservation</h3>
					  </div>
					  <div class="panel-body">

					   <div class="row">
			            <div class="col-6 col-sm-6 col-lg-6">
			             <div class="form-group" id="idno">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "Semester">ID Number: </label>
				              <div class="col-md-6">
				                <input class="form-control input-sm" id="idno" name="idno" readonly placeholder=
									  "ID Number" type="text" value="<?php echo (isset($cur)) ? $cur->IDNO : 'ID' ;?>">
								</div>	  
				         			                       	
				            </div>
				          </div>
				          <div class="form-group" id="idno">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "Semester">Name: </label>
				              <div class="col-md-6">
				                <input class="form-control input-sm" readonly placeholder=
									  "ID Number" type="text" value="<?php echo (isset($cur)) ? $cur->LNAME.', '.$cur->FNAME : 'Fullname' ;?>">
								</div>	  
				         			                       	
				            </div>
				          </div>
				      
			          
			              <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "Status">Status : </label>

				              <div class="col-md-6">
				                 <select class="form-control input-sm" name="Status" id="Status">
									<option value="New">New Student</option>
									<option value="Continuing">Continuing</option>	
									<option value="Trasferee">Trasferee</option>	
								</select>
				              </div>
				            </div>
				          </div>
			             <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "course">Course and Year :</label>

				              <div class="col-md-6">
				               <select class="form-control input-sm" name="course" id="course">
				                  	<?php
				                  	$course = new Course();
				                  	$cur = $course->listOfcourse();	
				                  	foreach ($cur as $course) {
				                  		echo '<option value="'. $course->COURSE_ID.'">'.$course->COURSE_NAME.' '.$course->COURSE_LEVEL .' '.$course->COURSE_MAJOR .'</option>';
				                  	}

				                  	?>
										
									</select>	
				              </div>
				            </div>
				          </div>
				          
			           
				           
			         
			             
			             <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "ay">Academic Year :</label>

				              <div class="col-md-6">
				                <select class="form-control input-sm" name="ay" id="ay">
									<option value="2013-2014">2013-2014</option>
									<option value="2014-2015">2014-2015</option>
									<option value="2015-2016">2015-2016</option>
									<option value="2016-2017">2016-2017</option>
									<option value="2017-2018">2017-2018</option>
									<option value="2018-2019">2018-2019</option>
									<option value="2019-2020">2019-2020</option>	
								</select>	
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-6 control-label" for=
				              "Semester">Semester : </label>

				              <div class="col-md-6">
				                 <select class="form-control input-sm" name="Semester" id="Semester">
									<option value="First">First</option>
									<option value="Second">Second</option>	
									<option value="Summer">Summer</option>	
								</select>
				              </div>
				            </div>
				          </div>
				          <div class="form-group" id="idno">
				            <div class="col-md-10">
				               <label class="col-md-4 control-label"></label>

				                <div class="col-md-8">
							         <div class="btn-group">
									    <button type="submit" name="savestep1" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
									    <a href="newstudent.php" name="add" class="btn btn-default"> <span class="glyphicon glyphicon-plus"></span> New Student</a>
									  
									  
									</div>
				                </div>

				            </div>

				          </div>
				       
				          
			            </div><!--/span-->


			            <div class="col-6 col-sm-6 col-lg-6">
			            	<h3>Step No.5</h3><p>After this step, student proceed to <b>step-6</b> for advising of subject(s).</p>
			            </div>	

			        </div><!--End or row-->
				          



					  </div>
					</div>
									
				</form>
				  
		  </div>

		</div>

<?php include("footer.php") ?>



