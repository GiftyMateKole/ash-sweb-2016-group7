<?php
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addPatient();		
			break;
		case 2:
			addDiagnosis();		
			break;
		default:
			echo "wrong cmd";
			break;
	}
	
	/**
	Adds a new patient
	*/
	function addPatient(){
		if(!isset($_REQUEST['uc'])){
			echo "Student id is not given";	
			exit();
		}
		
		$id=$_REQUEST['uc'];
		$fname=$_REQUEST['fname'];
		$lname=$_REQUEST['lname'];
		$gender=$_REQUEST['gender'];
		$age=$_REQUEST['age'];
		$phone=$_REQUEST['phone'];
		$email=$_REQUEST['email'];
		$insurance=$_REQUEST['insurance'];
		$location=$_REQUEST['location'];
		
		include("patientc.php");
		$obj=new patient();
		
		if($obj->addPatient($id,$fname,$lname,$gender,$age,$phone,$email,$insurance,$location)){
			echo "Patient added";
		}else{
			echo "Patient not added.";
		}
	}
	
	/**
	Adds diagnosis
	*/
	function addDiagnosis(){
		if(!isset($_REQUEST['name'])){
			echo "Disease name is not given";	
			exit();
		}
		
		$name=$_REQUEST['name'];
		$time=$_REQUEST['time'];
		$drugs=$_REQUEST['drugs'];
		$nurse=$_REQUEST['nurse'];
		$student=$_REQUEST['student'];
		$hospital=$_REQUEST['hospital'];
		$symptoms=$_REQUEST['symptoms'];
		
		include("patientc.php");
		$obj=new patient();
		
		if($obj->addDiagnosis($name,$symptoms,$time,$drugs,$nurse,$student,$hospital)){
			echo "Diagnosis added";
		}else{
			echo "Diagnosis not added.";
		}
	}
	
	
?>
