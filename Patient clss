<?php

include_once "adb.php";

class patient extends adb{
	function users(){
	}
//Function to add patients to the database
	function addPatient($id,$fname,$lname,$age,$gender,$num,$email,$location,$insurance){
		$query="insert into patient set STUDENT_ID='$id',FIRSTNAME='$fname',LASTNAME='$lname',PHONE='$num',EMAIL='$email',AGE='$age',GENDER='$gender',LOCATION='$location',INSURANCE_ID='$insurance'";
		$result=$this->query($query);
		if($result){
		echo "Patient Added Successfully";
	}else{
		echo "Error while adding data";
	}
		return $result;
	}
}
/*
$obj=new clinic();
$obj->addPatient('23456789','Elsa','Frozen',20,'FEMALE',23456789,'elsa@gmail.com','ON-CAMPUS',24345668);
*/
?>
