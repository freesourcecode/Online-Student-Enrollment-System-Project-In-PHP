<?php

	require_once("includes/initialize.php");
	//include 'header.php';
	  $INST_ID=$_POST['INST_ID'];
	  @$id=$_POST['selector'];
	  $key = count($id);

if (!$id==''){
//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$intructorClass = new InstructorClasses();
		$intructorClass->delete($id[$i]);
	}
			message("Faculty subject(s) already Deleted!","info");
			redirect('instructorSubjects.php?instructorId='.$INST_ID.'');
}else{
	message("Select your subject(s) first, if you want to delete it!","error");
	redirect('instructorSubjects.php?instructorId='.$INST_ID.'');
}
	
?>