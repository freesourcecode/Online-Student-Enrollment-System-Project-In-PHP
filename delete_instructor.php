<?php

	require_once("includes/initialize.php");
	//include 'header.php';

	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$inst = new Instructor();
		$inst->delete($id[$i]);
	}

			message("Faculty name(s) already Deleted!","info");
			redirect('listofinstructor.php');
?>
