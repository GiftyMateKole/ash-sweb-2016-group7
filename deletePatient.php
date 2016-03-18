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

	function getPatient($filter = false){
		$strQuery="select STUDENT_ID,FIRSTNAME,LASTNAME,GENDER,AGE,PHONE,EMAIL,INSURANCE_ID,LOCATION from patient";
		if ($filter!=false){
			$strQuery = $strQuery."where $filter";
		}
		return $this->query($strQuery);
	}
		function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" STUDENT_ID = $text";
		}
	
		return $this->getPatient($filter);
	}
	
	
	function deletePatient($pid){
		$strQuery = "delete from patient where STUDENT_ID = $pid";
		return $this->query($strQuery);
	}
}
/*$delP = new Info();
$delP->deletePatient(11362017);
*/
	?>
