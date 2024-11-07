<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
	<?php
		check_message();
			
		?>
		<div class="well">
			<?php 

				$student = new Student();
				$cur = $student->single_student($_GET['id']);
			?>
			    <form action="#.php" Method="POST">  					
				 <fieldset>
						<legend>Student Information</legend>
						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="btn-group">
						
						  		<a title="Click to edit student Information." href="edit_studentinfo.php?id=<?php echo $cur->IDNO; ?>">
									<button type="button" class="btn btn-default btn-sm pull-right" >
									  <span class="glyphicon glyphicon-pencil"></span> Edit
									</button>
								</a>
								</div>
							</div>
							</div>
						  </div>

						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>ID Number :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->IDNO; ?></a></h5>
							   	</div>
							</div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Fullname :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->LNAME .', '. $cur->FNAME.', '. $cur->MNAME; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Gender :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->SEX; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Age :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->AGE; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  
						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Birth Date :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->BDAY; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Place of Birth :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->BPLACE; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Civil Status :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->STATUS; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Nationality :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->NATIONALITY; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Religion :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->RELIGION; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Contact No. :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->CONTACT_NO; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Email Address :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->EMAIL; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Home Address :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $cur->HOME_ADD; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						   <?php
							  $mydb->setQuery("SELECT  `AY` ,  `SEMESTER` , y.`COURSE_ID` ,  `IDNO`,`COURSE_NAME`  
												FROM  `schoolyr` y,  `course` c
												WHERE y.`COURSE_ID` = c.`COURSE_ID` 
												AND  `IDNO` =".$_GET['id']);
							  $sy = $mydb->loadSingleResult();

						  ?>
						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Course :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $sy->COURSE_NAME; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						 
						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Semester :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $sy->SEMESTER; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Academic Year :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $sy->AY; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

				</fieldset>
				<?php
				$details = new Student_details();
				$det = $details->secondary_details($_GET['id']);
				?>
				 <fieldset>
						<legend>Secondary details</legend>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Father :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->FATHER; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Occupation :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->FATHER_OCCU; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Mother :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->MOTHER; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Occupation :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->MOTHER_OCCU; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Boarding :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->BOARDING; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>With family :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->WITH_FAMILY; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Guardian :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->GUARDIAN; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Address :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->GUARDIAN_ADDRESS; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h6>Other Person Supporting :</h6>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->OTHER_PERSON_SUPPORT; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Address :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $det->ADDRESS; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>


				</fieldset>	
				<?php
				$req = new Requirements();
				$res = $req->single_result($_GET['id']);
				?>
				 <fieldset>
						<legend>Requirements</legend>
						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>NSO :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $res->NSO; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Baptismal :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $res->BAPTISMAL; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Entrance test Result :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $res->ENTRANCE_TEST_RESULT; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Mirriage Contract :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $res->MARRIAGE_CONTRACT; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>
						   <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-2" id="Networks">
								   <h5>Certificate Of Transfer :</h5>
								</div>
							   <div class="col-md-10">
							   	  <h5><a><?php echo $res->CERTIFICATE_OF_TRANSFER; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>


				</fieldset>					
				<div class="btn-group">
				  <a href="newCourse.php" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete">Delete Selected</button>
				</div>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<?php include("footer.php") ?>



