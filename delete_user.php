<?php

	require_once("includes/initialize.php");
	//include 'header.php';

	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$user = new User();
		$user->delete($id[$i]);
	}

			message("User already Deleted!","info");
			redirect('listofuser.php');
?>
