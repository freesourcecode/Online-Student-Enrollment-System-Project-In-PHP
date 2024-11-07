<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
<?php

if (isset($_POST['save'])){

	if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
		$messageStats = false;
		message("All field is required!","error");
		check_message();
	}else{
		

		$user = new User();
		$acc_name		= $_POST['name'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];

		$res = $user->find_all_user($acc_name);
		
		
		if ($res >=1) {
			message("Account name already exist!", "error");
			check_message();
		}else{
			
			$user->ACCOUNT_NAME = $acc_name;
			$user->ACCOUNT_USERNAME = $acc_username;
			$user->ACCOUNT_PASSWORD = sha1($acc_password);
			$user->ACCOUNT_TYPE = $acc_type;
			
			 $istrue = $user->create(); 
			 if ($istrue == 1){
			 	message("New [". $acc_name ."] created successfully!", "success");
			 	redirect('listofuser.php');
			 	
			 }
		}	 

		
	}
}
?>			
			

			  <form class="form-horizontal well span6" action="newuser.php" method="POST">

					<fieldset>
						<legend>New User Account</legend>
															
				          
				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "name">Name:</label>

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
				              "username">Email Address:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="username" name="username" placeholder=
													  "Email Address" type="text" value="">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "pass">Password:</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="pass" name="pass" placeholder=
													  "Account Password" type="Password" value="">
				              </div>
				            </div>
				          </div>
				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "type">Type:</label>

				              <div class="col-md-8">
				               <select class="form-control input-sm" name="type" id="type">
				                	<option value="Administrator">Administrator</option>
				                	<option value="Registrar">Registrar</option>
				                	<option value="Course In-charge">Course In-charge</option>
				                	<option value="Encoder">Encoder</option>
				                </select>	
				              </div>
				            </div>
				          </div>

						
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>

				              <div class="col-md-8">
				                <button class="btn btn-primary" name="save" type="submit" >Save</button>
				              </div>
				            </div>
				          </div>

							
					</fieldset>	

				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-6 control-label" for=
		                "otherperson"></label>

		                <div class="col-md-6">
			             
		                </div>
		              </div>

		              <div class="col-md-6" align="right">
		               

		               </div>
		              
		          </div>
		          </div>
					
				</form>
			

				</div><!--End of container-->
			

<?php include("footer.php") ?>



