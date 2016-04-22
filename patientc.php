<?php
include_once("adb.php");
/**
Patients class
*/
class patient extends adb{
	function patients(){
	}
	
	/**
	*Adds a new patient
	*@param int $id student id
	*@param string $firstname first name
	*@param string $lastname last name
	*@param int $age student age
	*@param string $phone student phone number
	*@param string $email student email
	*@param string $location student hostel
	*@param int $insurance student insurance id
	*@return boolean returns true if successful or false 
	*/
	function addPatient($id,$fname,$lname,$gender,$age,$phone,$email,$insurance,$location){
		/**
		*@var string $strQuery stores sql statement
		*/
		$strQuery="insert into patient set STUDENT_ID='$id', 
		                                   FIRSTNAME='$fname', 
										   LASTNAME='$lname', 
										   GENDER='$gender', 
										   AGE='$age', 
										   PHONE='$phone', 
										   EMAIL='$email', 
										   INSURANCE_ID='$insurance', 
										   LOCATION='$location'";
		
	    $result=$this->query($strQuery);
		return $result;
	}
	
	/**
	*Adds new diagnosis
	*@param string $name disease name
	*@param string $symptoms symptoms
	*@param string $time 
	*@param string $drugs drugs administered
	*@param int $nurse nurse id
	*@param int $student student id
	*@param int $hosital hospital id
	*@return boolean returns true if successful or false 
	*/
	function addDiagnosis($name,$symptoms,$time,$drugs,$nurse,$student,$hospital){
		/**
		*@var string $strQuery stores sql statement
		*/
		$strQuery="insert into diagnosis set DISEASE_NAME='$name',SYMPTOMS='$symptoms', DRUGS_ADMINISTERED='$drugs', NURSE_ID='$nurse', Student_ID='$student', HOSPITAL_ID='$hospital', TIME='$time'";
		$result=$this->query($strQuery);
		return $result;
	}

}
/**
$obj=new patient();
$obj->addPatient('23456789','Tom','Keen','MALE',22,23456789,'keen@gmail.com',24345668,'OFF-CAMPUS');
$obj->addDiagnosis('Malaria','headache, fever','2016-04-20','Panadol',2,23456789,3);
*/
?>