<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class records extends adb{
	function records(){
	}
	/**
	*gets patients insurance records based on the filter     
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	
	function getInsuranceRecords($filter=false){
		$strQuery="select PATIENT_ID,FIRSTN,LASTN,GENDER,PHONE,EMAIL,insurance.INSURANCE_ID,insurance.INSURANCE_TYPE
		from patients left join insurance on patients.INSURANCEID=insurance.INSURANCE_ID";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*edits patients insurance records based on patients id     
	*@strQuery query data base patient id and insurance
	*@return boolean true if successful, else false
	*/
	function editInsuranceRecords($patientid,$firstname,$lastname,$gender,$email,$phone,$insurance){
		$strQuery="update patients,insurance set
		                FIRSTN='$firstname',
						LASTN='$lastname',
						GENDER='$gender',
						EMAIL='$email',
						PHONE='$phone',
						INSURANCE_TYPE='$insurance'
						where PATIENT_ID='$patientid' and patients.INSURANCEID=insurance.INSURANCE_ID";
		return $this->query($strQuery);
	}
	
    /**
	*gets nurse records based on the filter     
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/	
	function getNurses($filter=false){
		$strQuery="select NURSE_ID,USERNAME,FIRST_NAME, LAST_NAME,EMAIL,PHONE from nurse";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*edits nurse records based on nurse id     
	*@strQuery query data base on nurse id
	*@return boolean true if successful, else false
	*/
	function editNurse($nurseid,$username,$firstname,$lastname,$email,$phone){
		$strQuery="update nurse set
						USERNAME='$username',
						FIRST_NAME='$firstname',
						LAST_NAME='$lastname',
						EMAIL='$email',
						PHONE='$phone'
						where NURSE_ID='$nurseid'";
		return $this->query($strQuery);
	}
	
	/**
	*gets patients records based on the filter     
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getPatientRecords($filter=false){
		$strQuery="select diagnosis.DISEASE_NAME,diagnosis.DIAGNOSIS_ID,DRUGS_ADMINISTERED,
		TIME,NURSEID,HOSPITAL_ID,PATIENT_ID,nurse.NURSE_ID,patients.FIRSTN,patients.LASTN,
		patients.GENDER,nurse.USERNAME 
		from diagnosis left join patients on diagnosis.PATIENTID=patients.PATIENT_ID 
		left join nurse on nurse.NURSE_ID=diagnosis.NURSEID";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*edits patient records based on patient id     
	*@strQuery query data base on patient id
	*@return boolean true if successful, else false
	*/
	function editPatientRecords($patientid,$diagnoseid,$firstname,$lastname,$gender,$disease,$drugs,$hospital){
		$strQuery="update patients,diagnosis set
		                FIRSTN='$firstname',
						LASTN='$lastname',
						GENDER='$gender',
						DISEASE_NAME='$disease',
						DRUGS_ADMINISTERED='$drugs',
						HOSPITAL_ID='$hospital'
						where PATIENT_ID='$patientid' and patients.PATIENT_ID=diagnosis.PATIENTID";
		return $this->query($strQuery);
		}
}
?>