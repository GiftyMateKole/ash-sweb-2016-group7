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
		$strQuery = "delete from patient where STUDENT_ID = $pid";
		return $this->query($strQuery);
	}
}
/*$delP = new Info();
$delP->deletePatient(11362017);
*/
	?>
