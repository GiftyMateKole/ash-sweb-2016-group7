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
	?>
