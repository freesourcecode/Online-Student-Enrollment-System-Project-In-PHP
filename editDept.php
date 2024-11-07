<?php
require_once("includes/initialize.php");
include 'header.php';

$deptid = $_GET['id'];
$singledept = new Dept();
$object = $singledept->single_dept($deptid);

$message = "";
$success = false;
if (isset($_POST['save'])){

	if ($_POST['deptname'] == "" OR $_POST['deptdesc'] == "") {
		$messageStats = false;
		$message= "All field is required!";

	}else{
		$dept = new Dept();
		$deptid		= $_GET['id'];
		$deptname   = $_POST['deptname'];
		$dept_desc 	= $_POST['deptdesc'];
				
		$dept->DEPT_ID		   = $deptid;
		$dept->DEPARTMENT_NAME = $deptname;
		$dept->DEPARTMENT_DESC = $dept_desc;
		$dept->update($deptid);

		$success = true;
		$message = $deptname. " has updated successfully!";

	}
}

?>
<div class="container">
			
		<div class="well">
		 <?php

		 		if ($message == ""){
		 			$message = "";
		 		}else{
		 			if ($success == true ){
		 				echo  '<div class="alert alert-info">' . $message . '</div>';
		 				?>
		 				<script type="text/javascript">
							window.location='listofdept.php';
						</script>
						<?php	

		 			}else{
		 				echo  '<div class="alert alert-danger">' . $message . '</div>';
		 			}	
		 		
		 		}
			

			?>

			  <form class="form-horizontal well span6" action="editdept.php?id=<?php echo $deptid;?>" method="POST">

					<fieldset>
						<legend>Edit Department</legend>
															
				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "deptname">Department Name</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="<?php echo $object->DEPT_ID;?>">
				                 <input class="form-control input-sm" id="deptname" name="deptname" placeholder=
													  "Department Name" type="text" value="<?php echo $object->DEPARTMENT_NAME;?>">
				              </div>
				            </div>
				          </div>

						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "deptdesc">Department Description</label>

				              <div class="col-md-8">
				                   <input class="form-control input-sm" id="deptdesc" name="deptdesc" placeholder=
													  "Department Description" type="text" value="<?php echo $object->DEPARTMENT_DESC;?>">
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
					
				</form>
				</div><!--End of well-->

				</div><!--End of container-->
			

<?php include("footer.php") ?>



