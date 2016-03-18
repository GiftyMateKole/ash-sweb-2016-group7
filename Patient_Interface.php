html>
	<head>
		<title>Add Patient</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					<b>Ashesi Clinic Management System</b>
				</td>
			</tr>
					<td id="content">
					
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						
						<form action="patient.php" method="GET">
					
			<div>Student Id:   <input type="text" name="student_id"/><br></div>
			<div>Firstname:   <input type="text" name="fname"/><br></div>
			<div>Lastname:   <input type="text" name="lname"/><br></div>
			<div>Age:   <input type="text" name="age"/><br></div>
			<div>Gender:   <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female <br></div>
			<div>Location:   <select name="location">
			<option value="ON-CAMPUS">ON-CAMPUS</option>
			<option value="OFF-CAMPUS">OFF-CAMPUS</option>
			</select>
			<div>Phone Number:   <input type="text" name="num"/><br></div>
			<div>Email:   <input type="text" name="email"/></div>
			<div>Insurance ID:   <input type="text" name="insurance"/></div>
			<input type="submit" value="Add">
					</div>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>	

<?php
include_once "patient.php";
//Create an object of patient class
$obj=new patient();

if(isset($_REQUEST['student_id'])){
	$id=$_REQUEST['student_id'];
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$age=$_REQUEST['age'];
	$gender=$_REQUEST['gender'];
	$num=$_REQUEST['num'];
	$email=$_REQUEST['email'];
	$location=$_REQUEST['location'];
	$insurance=$_REQUEST['insurance'];
}

//calls the function addPatient
$result=$obj->addPatient($id,$fname,$lname,$age,$gender,$num,$email,$location,$insurance);

?>
