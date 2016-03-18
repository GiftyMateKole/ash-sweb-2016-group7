<html>
	
	</head>
	<body>
<?php
	include_once("records.php");
	/**
	*@obj to create new object
	*@param PATIENT_ID gets patient id
	*@param INSURANCE__ID gets insurance id
	*@param steQuery to query user data
	*/
	if(isset($_REQUEST['PATIENT_ID'])){
		$obj = new records();
		$patientid=$_REQUEST['PATIENT_ID'];
		$insuranceid=$_REQUEST['INSURANCE_ID'];
		$steQuery="select * from patients,insurance where PATIENT_ID='$patientid' and INSURANCE_ID='$insuranceid'
		and patients.INSURANCEID=insurance.INSURANCE_ID";
		$rr=$obj->query($steQuery);
		
		$r=$obj->fetch();
?>
		<form action="" method="GET" onsubmit='validate()'>
			<input type="hidden" name="studentid" value="<?php echo $r['NURSE_ID']?>">
			<div>PATIENT_ID: <input type="number_format" name="patientid" value="<?php echo $r['PATIENT_ID'] ?>"/></div>
			<div>Firstname: <input type="text" name="fname" value="<?php echo $r['FIRSTN'] ?>"/></div>
			<div>Lastname: <input type="text" name="lname" value="<?php echo $r['LASTN'] ?>"/></div>
			<div>Gender: <input type="text" name="gender" value="<?php echo $r['GENDER'] ?>"/></div>
			<div>EMAIL: <input type="text" name="email" value="<?php echo $r['EMAIL'] ?>"/></div>
			<div>PHONE: <input type="number_format" name="phone" value="<?php echo $r['PHONE'] ?>"/></div>
			<div>INSURANCE_TYPE: <input type="text" name="insurance" value="<?php echo $r['INSURANCE_TYPE'] ?>"/></div>
			<input type="submit" name="update" value="Edit">
			 
		</form>	
	</body>
</html>
	<?php }?>
<?php
    /**
	*validation of edit
	*/
if(isset($_REQUEST['update'])){
	$obj = new records();
	$patientid=$_REQUEST['patientid'];
	$firstname=$_REQUEST['fname'];
	$lastname=$_REQUEST['lname'];
	$gender=$_REQUEST['gender'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$insurance=$_REQUEST['insurance'];
	
	$re=$obj->editInsuranceRecords($patientid,$firstname,$lastname,$gender,$email,$phone,$insurance);
	print_r ($obj);
	if(!$re){
		echo "error updating";
	}else{
		echo "successfully updated";
		header ("Location:insurance.php");
	}
  }
?>