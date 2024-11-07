<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php

$gradeId = $_GET['gradeId'];
$grade = new Grades();
$cur = $grade->single_grades($gradeId);

	$subjid = $cur->SUBJ_ID;
	$studentId = $cur->IDNO;
	
if (isset($_POST['savegrades'])){

	if ($_POST['finalave']>=75 AND $_POST['finalave']<=100){
		$remarks = "Passed";
	}else{
		$remarks= "Failed";
	}

			$instClass = New InstructorClasses();
			$cur = $instClass->single_class($_GET['classId']);


		$grade = new Grades();
		$grade->INST_ID 	= $cur->INST_ID;
		$grade->PRE 		= $_POST['prelim'];
		$grade->MID 		= $_POST['midterm'];
		$grade->FIN 		= $_POST['final'];
		$grade->FIN_AVE	  	= $_POST['finalave'];
		$grade->REMARKS 	= $remarks;
		$grade->update($_GET['gradeId']);		 
 		message("");
		redirect("instructorClasses.php?classId=".$_GET['classId']."");
	}

?>		
		
		 
		        <form class="form-horizontal well span4" action="?classId=<?php echo $_GET['classId'];?>&gradeId=<?php echo $_GET['gradeId'];?>" method="POST">

					<fieldset>
						<legend>Add Grades</legend>
						 <div class="form-group">
			            <div class="col-md-8">
			            <?php 
			            	$stud = new Student();
			            	$cur=$stud->single_student($studentId);
			            ?>
			              <label class="col-md-4 control-label" for=
			              "subjdesc">Name</label>

			              <div class="col-md-8">
			                 <input class="form-control input-sm" id="studname" name="studname" readonly placeholder=
												  "Subject Description" type="text" value="<?php echo (isset($cur)) ? $cur->LNAME . ' , '.$cur->FNAME: 'Name' ;?>">
			              </div>
			            </div>
				          </div>								

							<div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "subjcode">Subject Code</label>
						<?php 
							$singlesubject = new Subject();
							$cur = $singlesubject->single_subject($subjid);
						?>
				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="subjcode" name="subjcode" readonly placeholder=
													  "Subject Code" type="text" value="<?php echo (isset($cur)) ? $cur->SUBJ_CODE : 'Code' ;?>">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "subjdesc">Subject Description</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="subjdesc" name="subjdesc" readonly placeholder=
													  "Subject Description" type="text" value="<?php echo (isset($cur)) ? $cur->SUBJ_DESCRIPTION  : 'Description' ;?>">
				              </div>
				            </div>
				          </div>
						<?php
				          $grade = new Grades();
						  $cur = $grade->single_grades($gradeId); 
						 ?>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "prelim">Prelim</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="prelim" name="prelim"   onkeyup="calculate()"  type="text" value="<?php echo (isset($cur)) ? $cur->PRE  : 'prelim' ;?>">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "midterm">Midterm</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="midterm" name="midterm"  onkeyup="calculate()"    type="text" value="<?php echo (isset($cur)) ? $cur->MID  : 'midterm' ;?>">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "final">Final</label>
				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="final" name="final"  onkeyup="calculate()"  type="text" value="<?php echo (isset($cur)) ? $cur->FIN  : 'final' ;?>">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "finalave">Final Average</label>
				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="finalave" name="finalave" readonly    type="text" value="<?php echo (isset($cur)) ? $cur->FIN_AVE  : 'finalave' ;?>">
				              </div>
				            </div>
				          </div>
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>
				              <div class="col-md-8">
				                <a href="instructorClasses.php?classId=<?php echo $_GET['classId']; ?>" class="btn btn-primary" name="savecourse" type="submit" >Back</a>
				               <button class="btn btn-primary" name="savegrades" type="submit" >Save</button>
				              </div>
				            </div>
				          </div>							
					</fieldset>	

									
				</form>
				</div><!--End of container-->
			

<?php include("footer.php") ?>

<script type="text/javascript" language="javascript">
 
 function calculate(){		 
     var prelims = document.getElementById('prelim').value; 
   	 var midterms = document.getElementById('midterm').value; 
   	 var finals = document.getElementById('final').value;  
 	
    var totalVal = parseInt(prelims) + parseInt(midterms) + parseInt(finals) ;
	 document.getElementById('finalave').value = totalVal;
     document.getElementById('finalave').value = Math.round((parseInt(totalVal)/3));  
        }
</script>