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
	
	if(isset($_REQUEST['un'])){
	$nid = $_REQUEST['un'];
	$newDel2 = new Info();
	$Del2 = $newDel2->deleteNurse($nid);
	if ($Del2 == false){
		
	}
	echo "error";
		exit();
	}
	?>
