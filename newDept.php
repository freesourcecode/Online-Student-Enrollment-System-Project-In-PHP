<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php
if (isset($_POST['save'])){

	if ($_POST['deptname'] == "" OR $_POST['deptdesc'] == "") {
		message("All field is required!", "error");
		check_message();
	}else{
		$dept = new Dept();
		$deptid		= $_POST['deptid'];
		$deptname   = $_POST['deptname'];
		$dept_desc 	= $_POST['deptdesc'];
		$res = $dept->find_all_dept($deptname);
				
		if ($res >=1) {
			message("Department name already exist!","error");
			check_message();
		}else{
			$dept->DEPARTMENT_NAME = $deptname;
			$dept->DEPARTMENT_DESC = $dept_desc;
			 $istrue = $dept->create(); 
			 if ($istrue == 1){
			 
			 	message("New [". $deptname ."] Department created successfully!","success");
				redirect('listofdept.php');

			 }
		}	 

		
	}
}

?>

		
		
			  <form class="form-horizontal well span6" action="newDept.php" method="POST">

					<fieldset>
						<legend>New Department</legend>
															
				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "deptname">Department Name</label>

				              <div class="col-md-8">
				              	<input name="deptid" type="hidden" value="">
				                 <input class="form-control input-sm" id="deptname" name="deptname" placeholder=
													  "Department Name" type="text" value="">
				              </div>
				            </div>
				          </div>

						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "deptdesc">Department Description</label>

				              <div class="col-md-8">
				                   <input class="form-control input-sm" id="deptdesc" name="deptdesc" placeholder=
													  "Department Description" type="text" value="">
				              </div>
				            </div>
				          </div>
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>

				              <div class="col-md-8">
				                <button class="btn btn-default" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
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



