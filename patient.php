
<?php

include_once "adb_1.php";

class patient extends adb_1{
	function users(){
	}
	/**
	*Adds a new patient
	*@param int $id student id
	*@param string $firstname first name
	*@param string $lastname last name
	*@param int $age student age
	*@param string $email student email
	*@param string $location student hotel
	*@param int $insurance student insurance id
	*@return boolean returns true if successful or false 
	*/
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
}

/**
$obj=new patient();
$obj->addPatient('23456789','Elsa','Frozen',20,'FEMALE',23456789,'elsa@gmail.com','ON-CAMPUS',24345668);
*/
?>
