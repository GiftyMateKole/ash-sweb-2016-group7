<?php
	header ("Location:User.php");
	
	//include users.php
	include_once("User.php");
	
	//check for user code
	if(isset($_REQUEST['uc'])){
	$pid = $_REQUEST['uc'];
	
	$newDel = new Info();
	$Del = $newDel->deletePatient($pid);
	if ($Del == false){
		echo "error";
	}
		exit();
	}
	?>
