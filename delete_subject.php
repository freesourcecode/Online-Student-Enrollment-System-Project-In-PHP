<?php

	require_once("includes/initialize.php");
	//include 'header.php';

	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$subj = new Subject();
		$subj->delete($id[$i]);
	}
	message("Course(s) already Deleted!","info");
	redirect('listofsubject.php');
	
?>
