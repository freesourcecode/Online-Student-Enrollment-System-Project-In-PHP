<?php
require_once("includes/initialize.php");
include 'header.php';

?>
<div class="container">
<?php
	check_message();
if (isset($_POST['submit'])){	

$IDNO  = $_POST['idno'];
$LNAME = $_POST['lName'];
$FNAME = $_POST['fName'];
$MNAME = $_POST['mName'];
$SEX   = $_POST['gender'];
$BDAY  = $_POST['bday'];
$BPLACE= $_POST['bplace'];
$STATUS= $_POST['status'];
$AGE   = $_POST['age'];
$NATIONALITY = $_POST['nationality'];
$RELIGION = $_POST['religion'];
$CONTACT_NO = $_POST['contact'];
$HOME_ADD = $_POST['home'];
$EMAIL   = $_POST['email'];


$student = new Student();
//$student->S_ID				= "null";
$student->IDNO 				=	$IDNO;
$student->LNAME				=	$LNAME;
$student->FNAME				=	$FNAME;
$student->MNAME				=	$MNAME;
$student->SEX				=	$SEX;
$student->BDAY				=	$BDAY;
$student->BPLACE			=	$BPLACE;
$student->STATUS			=	$STATUS;
$student->AGE				=	$AGE;
$student->NATIONALITY		=	$NATIONALITY;
$student->RELIGION			=	$RELIGION;
$student->CONTACT_NO		=	$CONTACT_NO;
$student->HOME_ADD			=	$HOME_ADD;
$student->EMAIL 			=	$EMAIL;

//course infor
/*$course	= $_POST['course'];
$semester = $_POST['semester'];
$ay		= $_POST['AY'];
$sy = new Schoolyr();
$sy->AY 		= $ay;
$sy->SEMESTER 	= $semester;
$sy->COURSE_ID	= $course;
$sy->IDNO 		= $IDNO;*/
/*if ($istrue) {
	output_message('course info successfully added!');
	redirect ('newstudent.php');
}

*/  
//secondary Details
$FATHER 			= $_POST['father'];
$FATHER_OCCU 		= $_POST['fOccu'];
$MOTHER 			= $_POST['mother'];
$MOTHER_OCCU 		= $_POST['mOccu'];
$BOARDING 			= $_POST['boarding'];
$WITH_FAMILY 		= $_POST['withfamily'];
$GUARDIAN 			=  $_POST['guardian'];
$GUARDIAN_ADDRESS 	=  $_POST['guardianAdd'];
$OTHER_PERSON_SUPPORT = $_POST['otherperson'];
$ADDRESS 			=  $_POST['otherAddress'];

$studdetails = new Student_details();
$studdetails->FATHER				=	$FATHER;
$studdetails->FATHER_OCCU			=	$FATHER_OCCU;
$studdetails->MOTHER				=	$MOTHER;
$studdetails->MOTHER_OCCU			=	$MOTHER_OCCU;
$studdetails->BOARDING			    =	$BOARDING;
$studdetails->WITH_FAMILY			=	$WITH_FAMILY;
$studdetails->GUARDIAN			    =	$GUARDIAN;
$studdetails->GUARDIAN_ADDRESS		=	$GUARDIAN_ADDRESS;
$studdetails->OTHER_PERSON_SUPPORT	=	$OTHER_PERSON_SUPPORT;
$studdetails->ADDRESS				=	$ADDRESS;
$studdetails->IDNO 				    =	$IDNO;

//  
/*if ($istrue) {
	output_message('Seccondary details successfully added!');
	redirect ('newstudent.php');
}
*/

//requirements
$nso  				  = isset($_POST['nso']) ? "Yes" : "No";
$bapt 				  = isset($_POST['baptismal']) ? "Yes" : "No";
$entrance 			  = isset($_POST['entrance']) ? "Yes" : "No";
$mir_contract  		  = isset($_POST['mir_contract']) ? "Yes" : "No";
$certifcateOfTransfer = isset($_POST['certifcateOfTransfer']) ? "Yes" : "No";

$requirements = new Requirements();

$requirements->NSO				 		= $nso;
$requirements->BAPTISMAL		   		= $bapt;
$requirements->ENTRANCE_TEST_RESULT		= $entrance;
$requirements->MARRIAGE_CONTRACT        = $mir_contract;
$requirements->CERTIFICATE_OF_TRANSFER	= $certifcateOfTransfer;
$requirements->IDNO 			   		= $IDNO;
//$istrue = $requirements->create(); 
/*if ($istrue) {
	output_message('Student requirements successfully added!');
	redirect ('newstudent.php');
} 
*/

if ($IDNO == "") {
	message('ID Number is required!', "error");
	redirect ('edit_studentinfo.php?id='.$IDNO);
}elseif ($LNAME == "") {
	message('Last Name is required!', "error");
	redirect ('edit_studentinfo.php?id='.$IDNO);
}elseif ($FNAME == "") {
	message('First Name is required!', "error");
	redirect ('edit_studentinfo.php?id='.$IDNO);
}elseif ($MNAME == "") {
	message('Middle Name is required!', "error");
	redirect ('edit_studentinfo.php?id='.$IDNO);
}elseif ($EMAIL == "") {
	message('Email address is required!', "error");
	redirect ('edit_studentinfo.php?id='.$IDNO);
	
}else{

	$student->update($_GET['id']); 
	//$sy->update($_GET['id']);  
	$studdetails->update($_GET['id']);
	$requirements->update($_GET['id']); 
	message('Student infomation updated successfully!', "info");
	redirect('listofstudent.php');	


}
}
?>
<?php 

				$student = new Student();
				$cur = $student->single_student($_GET['id']);
			?>
		        <form class="form-horizontal well span9" action="edit_studentinfo.php?id=<?php echo $cur->IDNO; ?>" method="POST">

					<fieldset>
						<legend>New Student</legend>
															

						<div class="form-group" id="idno">
			            <div class="col-md-4">
			              <label class="col-md-4 control-label" for=
			              "idno">ID Number*</label>

			              <div class="col-md-8">
			                 <input class="form-control input-sm" id="idno" name="idno" placeholder=
												  "ID Number" type="text" value="<?php echo $cur->IDNO; ?>" readonly>
			              </div>

			            </div>

			          </div>
			        
			         <div class="form-group">
			            <div class="rows">
			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "lName">LastName:*</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="lName" name="lName" type=
			                  "text" placeholder="Last Name" value="<?php echo $cur->LNAME; ?>">
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "fName">Firstname:*</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="fName" name="fName" type=
			                  "text" placeholder="First Name" value="<?php echo $cur->FNAME; ?>">
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "mName">Middlename:*</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="mName" name="mName" type=
			                  "text" placeholder="Middle Name" value="<?php echo $cur->MNAME; ?>">
			                </div>
			              </div>
			            </div>
			          </div>
						
						<div class="form-group">
			            <div class="rows">
			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "gender">Gender </label>

			                <div class="col-md-8">
				                <select class="form-control input-sm" name="gender" id="gender">
				                	<option value="<?php echo $cur->SEX; ?>"><?php echo $cur->SEX; ?></option>
									<option value="M">Male</option>
									<option value="F">Female</option>	
								</select>	
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "bday">Birth Date</label>
			    
							<div class="col-md-8">
			                    <div class="input-group date form_curdate col-md-15" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="11" type="text" value="<?php echo $cur->BDAY; ?>" readonly name="bday" id="bday">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			                </div>
			              </div>
						</div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "bplace">Birth place</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="bplace" name="bplace" type=
			                  "text" placeholder="Birth Place" value="<?php echo $cur->BPLACE; ?>">
			                </div>
			              </div>
			            </div>
			          </div>
												 
			          	<div class="form-group">
			            <div class="rows">
			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "status">Civil Status </label>

			                <div class="col-md-8">
				                <select class="form-control input-sm" name="status" id="status">
				                	<option value="<?php echo $cur->STATUS; ?>"><?php echo $cur->STATUS; ?></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>	
								</select>	
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "age">Age</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="age" name="age" type="number" placeholder="age" value="<?php echo $cur->AGE; ?>">
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "nationality">Nationality</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="nationality" name="nationality" type=
			                  "text" placeholder="Nationality" value="<?php echo $cur->NATIONALITY; ?>">
			                </div>
			              </div>
			            </div>
			          </div>
							
						<div class="form-group">
			            <div class="rows">
			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "religion">Religion </label>

			                <div class="col-md-8">
				                 <input class="form-control input-sm" id="religion" name="religion" type=
			                  "text" placeholder="Religion" value="<?php echo $cur->RELIGION; ?>">
			                </div>
			              </div>

			              <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "contact">Contact </label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="contact" name="contact" type="text" placeholder="Contact Number" value="<?php echo $cur->CONTACT_NO; ?>">
			                </div>
			              </div>
			               <div class="col-md-4">
			                <label class="col-md-4 control-label" for=
			                "email">Email*</label>

			                <div class="col-md-8">
			                  <input class="form-control input-sm" id="email" name="email" type=
			                  "email" placeholder="Email address" value="<?php echo $cur->EMAIL; ?>">
			                </div>
			              </div>
			          </div>
			          </div>

			          	<div class="form-group">
			            <div class="rows">
			              <div class="col-md-8">
			                <label class="col-sm-2 control-label" for=
			                "home">Home   </label>

			                <div class="col-md-10">
			                  <input class="form-control input-sm" id="home" name="home" type=
			                  "text" placeholder="Home Address" value="<?php echo $cur->HOME_ADD; ?>">
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
				<legend>Secondary Details</legend>

				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "father">Father </label>

		                <div class="col-md-8">
			                 <input class="form-control input-sm" id="father" name="father" type=
		                  "text" placeholder="Father" value="<?php echo $det->FATHER; ?>">
		                </div>
		              </div>

		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "fOccu">Occupation </label>

		                <div class="col-md-8">
		                  <input class="form-control input-sm" id="fOccu" name="fOccu" type="text" placeholder="Occupation" value="<?php echo $det->FATHER_OCCU; ?>">
		                </div>
		              </div>
		              
		          </div>
		          </div>

				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "mother">Mother </label>

		                <div class="col-md-8">
			                 <input class="form-control input-sm" id="mother" name="mother" type=
		                  "text" placeholder="Mother" value="<?php echo $det->MOTHER; ?>">
		                </div>
		              </div>

		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "mOccu">Occupation </label>

		                <div class="col-md-8">
		                  <input class="form-control input-sm" id="mOccu" name="mOccu" type="text" placeholder="Occupation" value="<?php echo $det->MOTHER_OCCU; ?>">
		                </div>
		              </div>
		              
		          </div>
		          </div>
				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "boarding">Are you Boarding? </label>

		                <div class="col-md-8">
			                   <div class="radio">
                          		 <label><input checked id="boarding"name="boarding" type=
                          "radio" value="Yes" checked="checked" >Yes</label>
                        	   </div>
			                  <div class="radio">
                          		 <label><input checked id="boarding" name="boarding" type=
                          "radio" value="No" <?php echo ($det->BOARDING=='No')? 'checked ="checked"':''; ?>>No</label>
                        	   </div>

							
		                </div>
		              </div>

		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "withfamily">With Family?</label>

		                <div class="col-md-8">
		              <div class="radio">
                          		 <label><input checked id="withfamily" name="withfamily" type=
                          "radio" value="Yes">Yes</label>
                        	   </div>
			                  <div class="radio">
                          		 <label><input checked id="withfamily" name="withfamily" type=
                          "radio" value="No">No</label>
                        	   </div>
		                </div>
		                </div>
		              </div>


		          </div>
				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "guardian">Guardian </label>

		                <div class="col-md-8">
			                 <input class="form-control input-sm" id="guardian" name="guardian" type=
		                  "text" placeholder="Guardian" value="<?php echo $det->GUARDIAN; ?>">
		                </div>
		              </div>

		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "guardianAdd">Address </label>

		                <div class="col-md-8">
		                  <input class="form-control input-sm" id="guardianAdd" name="guardianAdd" type="text" placeholder="Guardian Address" value="<?php echo $det->GUARDIAN_ADDRESS; ?>">
		                </div>
		              </div>
		              
		          </div>
		          </div>


				<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-6 control-label" for=
		                "otherperson">Other person Supporting </label>

		                <div class="col-md-6">
			                 <input class="form-control input-sm" id="otherperson" name="otherperson" type=
		                  "text" placeholder="Other Person Supporting" value="<?php echo $det->OTHER_PERSON_SUPPORT; ?>">
		                </div>
		              </div>

		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "otherAddress">Address </label>

		                <div class="col-md-8">
		                  <input class="form-control input-sm" id="otherAddress" name="otherAddress" type="text" placeholder="Address" value="<?php echo $det->ADDRESS; ?>">
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
					<legend>Other Details</legend>
					<div class="form-group">
		            <div class="rows">
		              <div class="col-md-6">
		                <label class="col-md-4 control-label" for=
		                "boarding">Requirements</label>

		                <div class="col-md-8">
			                 <div class="checkbox">
							    <label>
							      <input type="checkbox" name="nso" value="yes" <?php 
							      if ($res->NSO=='Yes'){
							       echo 'checked ="checked"';
							   	   };
							   	   ?>/> NSO
							    </label>
							    
							  </div>
							  <div class="checkbox">
							    <label>
							      <input type="checkbox" name="baptismal" value="yes" <?php 
							      if ($res->BAPTISMAL=='Yes'){
							       echo 'checked ="checked"';
							   	   };
							   	   ?>/> Baptismal
							    </label>
							    
							  </div>

							  <div class="checkbox">
							    <label>
							      <input type="checkbox" name="entrance" value="yes" <?php 
							      if ($res->ENTRANCE_TEST_RESULT=='Yes'){
							       echo 'checked ="checked"';
							   	   };
							   	   ?>/> Entrance Test Result
							    </label>
							    
							  </div>
							   <div class="checkbox">
							    <label>
							      <input type="checkbox" name="mir_contract" value="yes" <?php 
							      if ($res->MARRIAGE_CONTRACT=='Yes'){
							       echo 'checked ="checked"';
							   	   };
							   	   ?>/> Marriage Contract
							    </label>
							    
							  </div>
							   <div class="checkbox">
							    <label>
							      <input type="checkbox" name="certifcateOfTransfer" value="yes" <?php 
							      if ($res->CERTIFICATE_OF_TRANSFER=='Yes'){
							       echo 'checked ="checked"';
							   	   };
							   	   ?>/> Certificate of Transfer
							    </label>
							    
							  </div>

		                </div>
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
		               <button class="btn btn-primary" name="submit" type="submit" >Save</button>

		               </div>
		              
		          </div>
		          </div>
					
				</form>
			<!--	</div><!--End of well-->

				</div><!--End of container-->
			

<?php include("footer.php") ?>



