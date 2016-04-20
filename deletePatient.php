<?php
/**
*/
include_once("Adm.php");
/**
*Users  class
*/
class Info extends Adm{
	function Info(){
	}
	/**
	*Function get patient
	*@param int $filter which stores student id
	*@param boolean returns true if successful and false when there is failure
	*/
	function getPatient($filter = false){
		$strQuery="select STUDENT_ID,FIRSTNAME,LASTNAME,GENDER,AGE,PHONE,EMAIL,INSURANCE_ID,LOCATION from patient";
		if ($filter!=false){
			$strQuery = $strQuery."where $filter";
		}
		return $this->query($strQuery);
	}
	
	//method to retrieve the nurse information
	function getNurse($filter = false){
		$strQuery="select NURSE_ID,FIRST_NAME,LAST_NAME,EMAIL,PHONE,USERNAME,PWORD from nurse";
		if ($filter!=false){
			$strQuery = $strQuery."where $filter";
		}
		return $this->query($strQuery);
	}
	
	//method to retrieve the diagnosis information
	function getDiagnosis($filter = false){
		$strQuery="select DIAGNOSIS_ID,DISEASE_NAME,DIAGNOSIS_TIME,DRUGS_ADMINISTERED,NURSE_ID,STUDENT_ID,HOSPITAL_ID from diagnosis";
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
	
	//search for nurse using nurse id
	function searchNurse($text=false){
		$filter=false;
		if($text!=false){
			$filter=" NURSE_ID = $text";
		}
	
		return $this->getNurse($filter);
	}
	
	//search for dianosis using diagnosis id
	function searchDiagnosis($text=false){
		$filter=false;
		if($text!=false){
			$filter=" DIAGNOSIS_ID = $text";
		}
	
		return $this->getDiagnosis($filter);
	}
	
	/**
	*Deletes information on patients
	*@param int $pid stores and calls the patient's student id whose record is to be deleted
	*/
	function deletePatient($pid){
		$strQuery = "delete from patient where STUDENT_ID = $pid";
		return $this->query($strQuery);
	}
	
	//method to delete nurse information
	function deleteNurse($nid){
		$strQuery = "delete from nurse where NURSE_ID = $nid";
		return $this->query($strQuery);
	}
	
	//method to delete diagnosis information
	function deleteDiagnosis($did){
		$strQuery = "delete from diagnosis where DIAGNOSIS_ID = $did";
		return $this->query($strQuery);
	}
}
/*$delP = new Info();
$delP->deletePatient(11362017);
*/
	?>
