<?php
require_once("includes/initialize.php");
include 'header.php';
?>
 
<?php

$instructorId = $_GET['instructorId'];

$subjectId = $_POST['selector'];
$subjId = count($subjectId);

if (!$subjectId==''){
// echo $selector , $selector;
for ($i=0; $i<$subjId; $i++){
	$mydb->setQuery("SELECT  * 
					FROM  `subject` s 
					WHERE  SUBJ_ID='{$subjectId[$i]}'");
	$cur = $mydb->loadResultlist();
	foreach ($cur as  $result) {

 		$class = New InstructorClasses();
		$class->CLASS_CODE		=	$result->SUBJ_CODE;
		$class->SUBJ_ID			=	$result->SUBJ_ID;
		$class->INST_ID			=	$instructorId;
		$class->AY				=	$result->AY;
		$class->DAY				=	'NONE';
		$class->C_TIME			=	'NONE';
		$class->IDNO			=	'NONE';		
		$class->create();
 

	}
	message("Faculty Load(s) already Added!","info");
	redirect('instructorSubjects.php?instructorId='.$instructorId.'');
} 
}else{
	message("Select first the subject(s) you want to Add!","error");
	redirect('assignInstructorSubjects.php?instructorId='.$instructorId.'');
}

?>
 