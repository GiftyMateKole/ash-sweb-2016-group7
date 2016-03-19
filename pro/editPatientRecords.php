<html>
	
	</head>
	<body>
<?php
	include_once("records.php");
	/**
	*@obj to create new object
	*@param PATIENT_ID gets patient id
	*@param DIAGNOSIS_ID_ID gets diagnosis id
	*@param steQuery to query user data
	*/
	if(isset($_REQUEST['PATIENT_ID'])){
		$obj = new records();
		$patientid=$_REQUEST['PATIENT_ID'];
		$diagnoseid=$_REQUEST['DIAGNOSIS_ID'];
		$steQuery="select * from patients,diagnosis where PATIENT_ID='$patientid' and DIAGNOSIS_ID='$diagnoseid' 
         and diagnosis.PATIENTID=patients.PATIENT_ID";
		$rr=$obj->query($steQuery);
		$r=$obj->fetch();
?>
		<form action="" method="GET" onsubmit='validate()'>
			<input type="hidden" name="studentid" value="<?php echo $r['PATIENT_ID']?>">
			<input type="hidden" name="diagnoseid" value="<?php echo $r['DIAGNOSIS_ID']?>">
			<input type="hidden" name="nurseid" value="<?php echo $r['NURSE_ID']?>">
			<div>PATIENT_ID: <input type="number_format" name="patientid" value="<?php echo $r['PATIENT_ID'] ?>"/></div>
			<div>DIAGNOSEID: <input type="number_format" name="diagnoseid" value="<?php echo $r['DIAGNOSIS_ID'] ?>"/></div>
			<div>Firstname: <input type="text" name="fname" value="<?php echo $r['FIRSTN'] ?>"/></div>
			<div>Lastname: <input type="text" name="lname" value="<?php echo $r['LASTN'] ?>"/></div>
			<div>Gender: <input type="text" name="gender" value="<?php echo $r['GENDER'] ?>"/></div>
			<div>Disease: <input type="text" name="disease" value="<?php echo $r['DISEASE_NAME'] ?>"/></div>
			<div>Drugs: <input type="text" name="drugs" value="<?php echo $r['DRUGS_ADMINISTERED'] ?>"/></div>
			<div>Transfered to: <input type="text" name="hospital" value="<?php echo $r['HOSPITAL_ID'] ?>"/></div>
			<input type="submit" name="update" value="Edit">
			 
		</form>	
	</body>
</html>
	<?php }?>
<?php
    /**
	*validation of update
	*/
if(isset($_REQUEST['update'])){
	$obj = new records();
	$patientid=$_REQUEST['patientid'];
	$diagnoseid=$_REQUEST['diagnoseid'];
	$firstname=$_REQUEST['fname'];
	$lastname=$_REQUEST['lname'];
	$gender=$_REQUEST['gender'];
	$disease=$_REQUEST['disease'];
	$drugs=$_REQUEST['drugs'];
	$hospital=$_REQUEST['hospital'];
	
	$re=$obj->editPatientRecords($patientid,$diagnoseid,$firstname,$lastname,$gender,$disease,$drugs,$hospital);
    print_r ($obj);
	if(!$re){
		echo "error updating";
	}else{
		echo "successfully updated";
		header ("Location:patientRecords.php");
	}
  }
?>