<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php
if (isset($_POST['savefaculty'])){

	if ($_POST['name'] == "" OR $_POST['address'] == "" OR $_POST['email'] == "") {
		message("All field is required!","error");
		check_message();
	}else{
		

		$inst = new Instructor();
		$name   		= $_POST['name'];
		$address	 	= $_POST['address'];
		$Gender			= $_POST['Gender'];
		$civilstats 	= $_POST['civilstats'];
		$specialization = $_POST['specialization'];
		$email 			= $_POST['email'];
		$empStats 		= $_POST['empStats'];	



		$res = $inst->find_all_instructor($name);
				
		if ($res >=1) {
			message("Instructor name already exist!","error");
			check_message();
		}else{
			$inst->INST_FULLNAME		 = $name;
			$inst->INST_ADDRESS 		 = $address;
			$inst->INST_SEX 			 = $Gender;
			$inst->INST_STATUS 			 = $civilstats;
			$inst->SPECIALIZATION 		 = $specialization;
			$inst->INST_EMAIL 			 = $email;
			$inst->EMPLOYMENT_STATUS	 = $empStats;


			 $istrue = $inst->create(); 
			 if ($istrue == 1){
			 	
			 	message("New Instructor created successfully!","success");
			 	redirect('listofinstructor.php');
			 }else{

				message("No Instructor created!","erro");
			 	redirect('listofinstructor.php');

			 }
		}	 

		
	}
}

?>		
		
		 
		        <form class="form-horizontal well span4" action="#.php" method="POST">

					<fieldset>
						<legend>New Faculty</legend>
															

							<div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "name">Fullname:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="name" name="name" placeholder=
													  "Account Name" type="text" value="">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "address">Current Address:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="address" name="address" placeholder=
													  "Current Address" type="text" value="">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "Gender">Gender:</label>

				              <div class="col-md-8">
				               <select class="form-control input-sm" name="Gender" id="Gender">
				                	<option value="M">Male</option>
				                	<option value="F">Female</option>
				                	
				                </select>	
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "civilstats">Civil Status:</label>

				              <div class="col-md-8">
				               <select class="form-control input-sm" name="civilstats" id="civilstats">
				                	<option value="Single">Single</option>
				                	<option value="Married">Married</option>
				                	
				                </select>	
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "specialization">Specialization:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="specialization" name="specialization" placeholder=
													  "Specialization" type="text" value="">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "empStats">Employment Status:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="empStats" name="empStats" placeholder=
													  "Employment Status" type="text" value="">
				              </div>
				            </div>
				          </div>
				          


						<div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "email">Email Address:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="email" name="email" placeholder=
													  "Email Address" type="email" value="">
				              </div>
				            </div>
				          </div>

				          
						
												
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>

				              <div class="col-md-8">
				                <button class="btn btn-default" name="savefaculty" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
				              </div>
				            </div>
				          </div>

							
					</fieldset>	

									
				</form>
				</div><!--End of container-->
			

<?php include("footer.php") ?>



