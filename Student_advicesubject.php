<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<style type="text/css">
body { 
background-image: url(); 
background-repeat: no-repeat; 
height: 100%; 
width: 100%; 
background-position: bottom; 
} 
.top {
    border-top:thin solid;
    border-color:black;
}

.bottom {
    border-bottom:thin solid;
    border-color:black;
}

.left {
    border-left:thin solid;
    border-color:black;
}

.right {
    border-right:thin solid;
    border-color:black;
}
.header-row { position:fixed; top:0; left:0; }
.table {padding-top:5px; }
</style>

<div class="rows">

  <div class="col-12 col-sm-12 col-lg-12">
	<?php
		  	 if (isset($_POST['search'])){
				if ($_POST['txtsearch']==""){
					message("ID Number is required!","error");
					check_message();

				}else{

					$Schoolyr = new Schoolyr();
					$NumberofResult = $Schoolyr->findsy($_POST['txtsearch']);
					if ($NumberofResult == 0){
						message("This Student is advice to go back from step 1!","error");
						check_message();

					}else{
						$sy = $Schoolyr->single_sy($_POST['txtsearch']);
						$course = new Course();
						$studcourse = $course->single_course($sy->COURSE_ID);
					}

					$student = new Student();
					$cur = $student->single_student($_POST['txtsearch']);

					
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
  
    <form class="navbar-form navbar-left" action="Student_advicesubject.php" method="POST">
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
					    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Advising of Subjects by the Dean and Assesment of Units</h3>
					  </div>
					  <div class="panel-body">

					   <div class="row">
			         	   <div class="col-8 col-sm-8 col-lg-8">     
			            		          
			           
				           <table align="center">
				         	<thead>
							  	<tr id="table">
							  		<th width="10%" >ID Number</th>
							  		<th width="20%" >Name</th>
							  		<th width="10%" >Status</th>
							 		<th width="10%" >AY</th>
							 		<th width="10%">Semester</th>
							 		<th width="300%" >Course</th>
							  		
				
							  	</tr>	
						    </thead> 
						     <tbody>
						     	<tr>
						     		<td><?php echo (isset($cur)) ? $cur->IDNO : 'ID' ;?></td>
						     		<td><?php echo (isset($cur)) ? $cur->LNAME.', '.$cur->FNAME : 'Fullname' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->STATUS : 'STATUS' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->AY : 'STATUS' ;?></td>
						     		<td><?php echo (isset($sy)) ? $sy->SEMESTER : 'COURSE' ;?></td>
						     		<td><?php echo (isset($studcourse)) ? $studcourse->COURSE_NAME .' - '.$studcourse->COURSE_LEVEL.$studcourse->COURSE_MAJOR : 'COURSE' ;?></td>
						     	</tr>
						      </tbody>
						       <tfoot>
				  	
							  	<tr><td   colspan="7"></td></tr>
							  	<tr><td  colspan="6" align="Right"></td><td align="center" ></td></tr>
							  </tfoot>	   
					    	<table>
					
				           </table>
			            			             
			            </div>
				          
			            </div><!--/span-->
			        <div class="rows">
		  
            <div class="col-10 col-sm-10 col-lg-10">
            

					<div class="panel panel-primary">
					  
					  <div class="panel-body">
					  	<html>
					  
					  	<body>
					    <form class="form-horizontal span4" action="#.php" method="POST">
					    
					    	<table>
					<caption><h3 align="left">Adviced Subjects</h3></caption>
				  <thead>
				  	<tr id="table">
				  		<th width="20%" class="bottom">Subject Code</th>
				  		<th width="30%" class="bottom">Description</th>
				  		<th width="10%" class="bottom">Semester</th>
				 		<th width="10%" class="bottom">Course</th>
				 		<th width="10%" class="bottom">Level</th>
				 		<th width="10%" class="bottom">Pre-requisite</th>
				 		<th width="10%" align="center" class="bottom">Unit</th>
				  		
	
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  	 $cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
					  		$mydb->setQuery("SELECT * 
											FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID` = c.`COURSE_ID`
											AND s.`COURSE_ID` =".$cid . " AND SEMESTER='First'");
					
				  			$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';

						  		echo '<td width="15%">'.$result->SUBJ_CODE .'</td>';
						  		echo '<td width="30%">'. $result->SUBJ_DESCRIPTION.'</td>';
						  		echo '<td>'. $result->SEMESTER.'</td>';
						  		echo '<td>'. $result->COURSE_NAME.'</td>';
						  		echo '<td>'. $result->COURSE_LEVEL.'</td>';
  								echo '<td>'. $result->PRE_REQUISITE.'</td>';
  								echo '<td align="center">'. $result->UNIT.'</td>';
						
						  		echo '</tr>';
					  		}
					  	 
				  	?>
				  </tbody>
				  <tfoot>
				  		<?php
				  	 $cid = (isset($studcourse)) ? $studcourse->COURSE_ID : 0;
					$mydb->setQuery("SELECT SUM(UNIT) as UN
											FROM  `subject` s,  `course` c
											WHERE s.`COURSE_ID` = c.`COURSE_ID`
											AND s.`COURSE_ID` =".$cid . " AND SEMESTER='First'");
					  		$result = $mydb->loadSingleResult();
							
							
					  	 
				  	?>
				  	<tr><td class="bottom"  colspan="7"></td></tr>
				  	<tr><td  colspan="6" align="Right"><Strong>Total</Strong></td><td align="center" ><strong><?php echo $result->UN; ?></strong></td></tr>
					<tr><td  colspan="7"></td></tr>
				  	<tr><td colspan="2">Date Printed:  <? print(Date("l F d, Y")); ?> .</td><td colspan="2">Advised and signed by:</td><td ></td></tr>
				  </tfoot>	
				</table>
			
							
						<div class="btn-group">
						  <a href="preview_adviceslip.php?txtsearch=<?php echo $_POST['txtsearch']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Preview</a>
					<!--	  <button type="button" class="btn btn-default" name="print"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>-->
						</form>
						</body>
						</html>		
					  </div>
					</div>
									
				</form>
			<SCRIPT LANGUAGE="JavaScript"> 
			if (window.print) {
			document.write('<form><!--<input type=button name=print value="Print" onClick="window.print()" visible="false">--></form>');
			}
			</script>

            </div><!--/span-->
            
        </div><!--End or row-->
          


			        </div><!--End or row-->
				          



					  </div>
					</div>
									
				</form>
				  
		  </div>

		</div>

		   
            
			

<?php include("footer.php") ?>



