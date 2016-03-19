<html>
	
	</head>
	<body>
<?php
	include_once("records.php");
	/**
	*@obj to create new object
	*@param NURSE_ID gets nurse id
	*@param steQuery to query user data
	*/
	if(isset($_REQUEST['NURSE_ID'])){
		$obj = new records();
		$nurseid=$_REQUEST['NURSE_ID'];
		$steQuery="select * from nurse where NURSE_ID='$nurseid'";
		$rr=$obj->query($steQuery);
		$r=$obj->fetch();
?>
		<form action="" method="GET" onsubmit='validate()'>
			<input type="hidden" name="studentid" value="<?php echo $r['NURSE_ID']?>">
			<div>NURSE_ID: <input type="text" name="nurseid" value="<?php echo $r['NURSE_ID'] ?>"/></div>
			<div>USERNAME: <input type="text" name="username" value="<?php echo $r['USERNAME'] ?>"/></div>
			<div>Firstname: <input type="text" name="fname" value="<?php echo $r['FIRST_NAME'] ?>"/></div>
			<div>Lastname: <input type="text" name="lname" value="<?php echo $r['LAST_NAME'] ?>"/></div>
			<div>EMAIL: <input type="text" name="email" value="<?php echo $r['EMAIL'] ?>"/></div>
			<div>PHONE: <input type="text" name="phone" value="<?php echo $r['PHONE'] ?>"/></div>
			<input type="submit" name="update" value="Edit">
			 
		</form>	
	</body>
</html>
	<?php }?>
<?php
    /**
	*validation of save
	*/
if(isset($_REQUEST['update'])){
	$obj = new records();
	$nurseid=$_REQUEST['nurseid'];
	$username=$_REQUEST['username'];
	$firstname=$_REQUEST['fname'];
	$lastname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	
	$re=$obj->editNurse($nurseid,$username,$firstname,$lastname,$email,$phone);
	if(!$re){
		echo "error updating";
	}else{
		echo "successfully updated";
		header ("Location:nursesRecords.php");
	}
  }
?>