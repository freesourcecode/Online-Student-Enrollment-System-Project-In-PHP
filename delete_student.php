<?php

	require_once("includes/initialize.php");
	//include 'header.php';

	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$student = new Student();
		$student->delete($id[$i]);
		$details = new Student_details();
		$details->delete($id[$i]);
		$sy = new Schoolyr();
		$sy->delete($id[$i]);
		$req = new Requirements();
		$req->delete($id[$i]);

	}

			message("Student has successfully deleted!","info");
			redirect('listofstudent.php');
?>
