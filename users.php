<?php
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function users(){
	}

/**
*Returns all information from the diagnosis table
*@param null
*return boolean returns true if successful or false 
*/
    function getAllDiagnosis(){
	$strQuery="select DIAGNOSIS_ID,diagnosis.DISEASE_NAME, diagnosis.TIME, diagnosis.DRUGS_ADMINISTERED, 
		nurse.USERNAME,hospital.NAME,LOCATION,patient.FIRSTNAME,patient.LASTNAME,patient.AGE,
		patient.PHONE from diagnosis left join nurse on diagnosis.NURSE_ID=nurse.NURSE_ID
		left join patient on diagnosis.STUDENT_ID=patient.STUDENT_ID left join hospital on diagnosis.HOSPITAL_ID=hospital.HOSPITAL_ID";
		
		return $this->query($strQuery);	
	}
   
   function editDiagnosis($diagnosisid,$diseasename,$time,$drugs,$student,$nurse,$hospital){
		$strQuery="update diagnosis,patient set
		                DIAGNOSIS_ID='$diagnosisid',
						DISEASE_NAME='$diseasename',
						TIME ='$time',
						DRUGS_ADMINISTERED='$drugs',
						NURSE_ID='$nurse',
						HOSPITAL_ID='$hospital'
						where diagnosis.STUDENT_ID='$student'";
		return $this->query($strQuery);
	}
	/**
	*Returns all the information from the patient table
	*@param null
	*return boolean returns true if successful or false 
	*/
	function getPatientInfo(){
		$strQuery="select STUDENT_ID,FIRSTNAME,LASTNAME,GENDER,AGE,PHONE,EMAIL, LOCATION, insurance.INSURANCE_TYPE
		from patient left join insurance on patient.Insurance_ID=insurance.Insurance_ID";
		
		return $this->query($strQuery);
	}
	function Patient(){
		$strQuery="select STUDENT_ID,GENDER,AGE,EMAIL,LOCATION from patient";
	    return $this->query($strQuery);
	}
	function Diagnosis(){
		$strQuery="select DIAGNOSIS_ID,DISEASE_NAME,TIME,DRUGS_ADMINISTERED,STUDENT_ID,NURSE_ID,HOSPITAL_ID 
		from diagnosis";
	    return $this->query($strQuery);
	}
	function editPatientInfo($studentid,$firstname,$lastname,$gender,$phone,$insurance,$location,$email,$age){
		$strQuery="update patient,insurance set
						STUDENT_ID='$studentid',
						FIRSTNAME='$firstname',
						LASTNAME='$lastname',
						GENDER='$gender',
						PHONE='$phone',
						patient.INSURANCE_ID='$insurance',
						LOCATION='$location',
						EMAIL='$email',
						AGE='$age'
						where STUDENT_ID='$studentid'";
		return $this->query($strQuery);
    }
	/**
	*Returns information from the patient table on a specific individual
	*@param int $filter filter as STUDENT_ID
	*getPatient returns boolean true if successful or false
	*/
	function getPatient($filter=false){
		$strQuery="select STUDENT_ID,FIRSTNAME,LASTNAME,GENDER,AGE,PHONE,EMAIL, LOCATION, insurance.INSURANCE_TYPE
		from patient left join insurance on patient.Insurance_ID=insurance.Insurance_ID";
		
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Returns all information from the hospital table
	*@param null 
	*getHospital() returns boolean true if successful or false
	*/
	function getHospital(){
		$strQuery="select HOSPITAL_ID, NAME, ADDRESS, PHONE from hospital";

		return $this->query($strQuery);
	}
	function editHospital($hospitalid,$name,$address,$number){
		$strQuery="update hospital set
						HOSPITAL_ID='$hospitalid',
						NAME='$name',
						ADDRESS='$address',
						PHONE='$number'
						where HOSPITAL_ID='$hospitalid'";
		return $this->query($strQuery);
	}
	
	/**
	*Calls on the getPatient($filter) to return information from the patient table on a specific individual
	*@param int $text text as STUDENT_ID
	*returns boolean true if successful or false
	*/
	function searchPatient($text=false){
		$filter=false;
		if($text!=false){
			$filter="Student_ID like '%$text%'";
		}
		
		return $this->getPatientFile($filter);
	}
	
		/**
	*Function get patient
	*@param int $filter which stores student id
	*@param boolean returns true if successful and false when there is failure
	*/
	function getPatientFile($filter = false){
		$strQuery="select STUDENT_ID,FIRSTNAME,LASTNAME,GENDER,AGE,PHONE,EMAIL,INSURANCE_ID,LOCATION from patient
		where STUDENT_ID='$filter'";
		if ($filter!=false){
			$strQuery = $strQuery."where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Searchs for patient using student id
	*@param int $text contains the student id 
	*/
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" STUDENT_ID = $text";
		}
	
		return $this->getPatient($filter);
	}
	
	/**
	*Deletes information on patients
	*@param int $pid stores and calls the patient's student id whose record is to be deleted
	*/
	function deletePatient($pid){
		$strQuery = "delete from patient where STUDENT_ID = $pid;";
		return $this->query($strQuery);
	}
	
	function addPatient($id,$fname,$lname,$age,$gender,$num,$email,$location,$insurance){
		$query="insert into patient set STUDENT_ID='$id',FIRSTNAME='$fname',LASTNAME='$lname',PHONE='$num',EMAIL='$email',AGE='$age',
		        GENDER='$gender',LOCATION='$location',INSURANCE_ID='$insurance'";
		$result=$this->query($query);
		if($result){
		echo "Patient Added Successfully";
	}else{
		echo "Error while adding data";
	}
		return $result;
	}
	
	function getNursesInfo($filter=false){
		$strQuery="select NURSE_ID,USERNAME,FIRST_NAME, LAST_NAME,EMAIL,PHONE from nurse";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	function editNursesInfo($nurseid,$username,$firstname,$lastname,$email,$phone){
		$strQuery="update nurse set
						USERNAME='$username',
						FIRST_NAME='$firstname',
						LAST_NAME='$lastname',
						EMAIL='$email',
						PHONE='$phone'
						where NURSE_ID='$nurseid'";
		return $this->query($strQuery);
	}
	
	function getInsuranceInfo($filter=false){
		$strQuery="select insurance.INSURANCE_ID,insurance.INSURANCE_TYPE,patient.INSURANCE_ID
		from insurance left join patient on insurance.INSURANCE_ID=patient.INSURANCE_ID";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	function editInsuranceInfo($insuranceid,$insurance){
		$strQuery="update insurance set
		                INSURANCE_ID='$insuranceid',
						INSURANCE_TYPE='$insurance'
						where INSURANCE_ID='$insuranceid'";
		return $this->query($strQuery);
	}
	
	function savehospital(){
		$strQuery="UPDATE hospital SET
	        $column = :value WHERE HOSPITAL_ID = :id";
		return $this->query($strQuery);
    }
 }
	


/*
Unit Test
$obj = new users();

$r=$obj->Patient(34552017);
$db=$obj->fetch();
print_r($db);

$r=$obj->getHospital(2);
$db=$obj->fetch();
print_r($db);

$r=$obj->getPatientInfo(63652017);
$db=$obj->fetch();
print_r($db);

$r=$obj->getAllDiagnosis(34552017);
$db=$obj->fetch();
print_r($db);
*/

?>

