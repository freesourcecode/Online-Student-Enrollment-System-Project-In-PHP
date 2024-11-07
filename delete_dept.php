<?php

	require_once("includes/initialize.php");
	//include 'header.php';

	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$dept = new Dept();
		$dept->delete($id[$i]);
	}

			message("Department name(s) already Deleted!","info");
			redirect('listofdept.php');
?>
