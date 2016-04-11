
	<?php
		include_once("users.php");
		
		if(isset($_REQUEST['code'])&& isset($_REQUEST['DIAGNOSIS_ID'])){
		$code=$_REQUEST['code'];
		if($code==1){
			$obj = new users();
			$diagnoseid=$_REQUEST['DIAGNOSIS_ID'];
			$steQuery="select DIAGNOSIS_ID,DISEASE_NAME,TIME,DRUGS_ADMINISTERED,diagnosis.STUDENT_ID,
			diagnosis.NURSE_ID,diagnosis.HOSPITAL_ID 
			from diagnosis where diagnosis.DIAGNOSIS_ID='$diagnoseid'";
			$rr=$obj->query($steQuery);
			$r=$obj->fetch();
	?>
	<html>
	<head>
		<title>Edit Diagnosis</title>
		<link rel="stylesheet" href="css/group.css">
		<script>
			
		</script>
	</head>
	<body>
				   <div id="header">
					    <img src="logo.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	        <li><a class="selected" href="#">Dashboard</a></li>
	         	  	  <li><a href="home.html">Home</a></li>
	         	  	  <li><a href="trialSearch.php">Search</a></li>
	         	  	  <li><a href="view.php">Edit</a></li>
	         	  	  <li><a href="addPatientTrial.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
								  <b>EDIT DIAGNOSIS TABLE</b>
									
								</div><br><br>
				
					<div id="divContent">
						
						<form action="" method="GET" onsubmit='validate()'>
				<input type="hidden" name="studentid" value="<?php echo $r['STUDENT_ID']?>">
				<input type="hidden" name="diagnoseid" value="<?php echo $r['DIAGNOSIS_ID']?>">
				<div>DIAGNOSIS_ID: <input type="number_format" name="diagnoseid" value="<?php echo $r['DIAGNOSIS_ID'] ?>"/></div><br>
				<div>DISEASE_NAME: <input type="text" name="disease" value="<?php echo $r['DISEASE_NAME'] ?>"/></div><br>
				<div>TIME: <input type="text" name="time" value="<?php echo $r['TIME'] ?>"/></div><br>
				<div>DRUGS_ADMINISTERED: <input type="text" name="drugs" value="<?php echo $r['DRUGS_ADMINISTERED'] ?>"/></div><br>
				<div>STUDENT_ID: <input type="number_format" name="student" value="<?php echo $r['STUDENT_ID'] ?>"/></div><br>
				<div>NURSE_ID: <input type="number_format" name="nurse" value="<?php echo $r['NURSE_ID'] ?>"/></div><br>
				<div>HOSPITAL_ID: <input type="number_format" name="hospital" value="<?php echo $r['HOSPITAL_ID'] ?>"/></div>
				<input type="submit" name="update" value="Edit">
				 
			</form>
				</div>
			</div>
		</div>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	</body>
</html>	
			
	<?php
		}
		}
		if(isset($_REQUEST['update'])){
		echo "here";
		$obj = new users();
		$diagnosisid=$_REQUEST['diagnoseid'];
		$diseasename=$_REQUEST['disease'];
		$time=$_REQUEST['time'];
		$drugs=$_REQUEST['drugs'];
		$student=$_REQUEST['student'];
		$nurse=$_REQUEST['nurse'];
		$hospital=$_REQUEST['hospital'];
		
		$re=$obj->editDiagnosis($diagnosisid,$diseasename,$time,$drugs,$student,$nurse,$hospital);
		if(!$re){
			echo "error updating";
		}else{
			echo "successfully updated";
			header ("Location:editClinic.php");
		}
		}
		else if(isset($_REQUEST['code'])&& isset($_REQUEST['HOSPITAL_ID'])){
			$obj = new users();
			$code=$_REQUEST['code'];
			$hospitalid=$_REQUEST['HOSPITAL_ID'];
			if($code==2){
			$steQuery="select HOSPITAL_ID,NAME,ADDRESS,PHONE
			from hospital where hospital.HOSPITAL_ID='$hospitalid'";
			$rr=$obj->query($steQuery);
			$r=$obj->fetch();
	?>
	<html>
	<head>
		<title>Edit Hospital</title>
		<link rel="stylesheet" href="css/group.css">
		<script>
			
		</script>
	</head>
	<body>
				   <div id="header">
					    <img src="logo.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	       <li><a class="selected" href="#">Dashboard</a></li>
	         	  	       <li><a href="group.html">Home</a></li>
	         	  	       <li><a href="usersSearch.php">Search</a></li>
	         	  	       <li><a href="editClinic.php">Edit</a></li>
	         	  	       <li><a href="view.php">View</a></li>
	         	  	       <li><a href="addPatient.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
								  <b>EDIT HOSPITAL TABLE</b>
									
								</div><br><br>
				
					<div id="divContent">
						
						<form action="" method="GET" onsubmit='validate()'>
				<input type="hidden" name="hospitalid" value="<?php echo $r['HOSPITAL_ID']?>"><br>
				<div>HOSPITAL_ID: <input type="number_format" name="hospitalid" value="<?php echo $r['HOSPITAL_ID'] ?>"/></div><br>
				<div>NAME: <input type="text" name="name" value="<?php echo $r['NAME'] ?>"/></div><br>
				<div>ADDRESS: <input type="text" name="address" value="<?php echo $r['ADDRESS'] ?>"/></div><br>
				<div>NUMBER: <input type="number_format" name="number" value="<?php echo $r['PHONE'] ?>"/></div>
				<input type="submit" name="modify" value="Edit">
				 
			</form>
				</div>
			</div>
		</div>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	</body>
</html>	
			
			
	<?php
	   }
	   }
		if(isset($_REQUEST['modify'])){
		$obj = new users();
		$hospitalid=$_REQUEST['hospitalid'];
		$name=$_REQUEST['name'];
		$address=$_REQUEST['address'];
		$number=$_REQUEST['number'];
		
		$re=$obj->editHospital($hospitalid,$name,$address,$number);
		if(!$re){
			echo "error updating";
		}else{
			echo "successfully updated";
			header ("Location:editClinic.php");
		}
		}
		
		else if(isset($_REQUEST['code'])&& isset($_REQUEST['STUDENT_ID'])){
			$obj = new users();
			$studentid=$_REQUEST['STUDENT_ID'];
			$code=$_REQUEST['code'];
			if($code==3){
			$steQuery="select STUDENT_ID, FIRSTNAME,LASTNAME,GENDER,PHONE,patient.INSURANCE_ID,
			LOCATION,EMAIL,AGE
			from patient where patient.STUDENT_ID='$studentid'";
			$rr=$obj->query($steQuery);
			$r=$obj->fetch();
	?>
	<html>
	<head>
		<title>Edit Patient</title>
		<link rel="stylesheet" href="css/group.css">
		<script>
			
		</script>
	</head>
	<body>
				   <div id="header">
					    <img src="logo.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	       <li><a class="selected" href="#">Dashboard</a></li>
	         	  	       <li><a href="group.html">Home</a></li>
	         	  	       <li><a href="usersSearch.php">Search</a></li>
	         	  	       <li><a href="editClinic.php">Edit</a></li>
	         	  	       <li><a href="view.php">View</a></li>
	         	  	       <li><a href="addPatient.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
								  <b>EDIT Patient TABLE</b>
									
								</div><br><br>
				
					<div id="divContent">
						
						<form action="" method="GET" onsubmit='validate()'>
				<div>STUDENT_ID: <input type="number_format" name="studentid" value="<?php echo $r['STUDENT_ID'] ?>"/></div><br>
				<div>FIRSTNAME: <input type="text" name="firstname" value="<?php echo $r['FIRSTNAME'] ?>"/></div><br>
				<div>LASTNAME: <input type="text" name="lastname" value="<?php echo $r['LASTNAME'] ?>"/></div><br>
				<div>GENDER: <input type="text" name="gender" value="<?php echo $r['GENDER'] ?>"/></div><br>
				<div>PHONE: <input type="number_format" name="phone" value="<?php echo $r['PHONE'] ?>"/></div><br>
				<div>INSURANCE_ID: <input type="number_format" name="insurance" value="<?php echo $r['INSURANCE_ID'] ?>"/></div><br>
				<div>LOCATION: <input type="text" name="location" value="<?php echo $r['LOCATION'] ?>"/></div><br>
				<div>EMAIL: <input type="email" name="email" value="<?php echo $r['EMAIL'] ?>"/></div><br>
				<div>AGE: <input type="text" name="age" value="<?php echo $r['AGE'] ?>"/></div>
				<input type="submit" name="up" value="Edit">
				 
			</form>
				</div>
			</div>
		</div>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	</body>
</html>	
			
	<?php
		}
		}
		if(isset($_REQUEST['up'])){
		$obj = new users();
		$studentid=$_REQUEST['studentid'];
		$firstname =$_REQUEST['firstname'];
		$lastname =$_REQUEST['lastname'];
		$gender=$_REQUEST['gender'];
		$phone=$_REQUEST['phone'];
		$insurance=$_REQUEST['insurance'];
		$location=$_REQUEST['location'];
		$email =$_REQUEST['email'];
		$age =$_REQUEST['age'];
		
		$re=$obj->editPatientInfo($studentid,$firstname,$lastname,$gender,$phone,$insurance,$location,$email,$age);
		if(!$re){
			echo "error updating";
		}else{
			echo "successfully updated";
			header ("Location:editClinic.php");
		}
		}
	  else if(isset($_REQUEST['code'])&& isset($_REQUEST['NURSE_ID'])){
			$obj = new users();
			$nurseid=$_REQUEST['NURSE_ID'];
			$code=$_REQUEST['code'];
			if($code==4){
			$steQuery="select * from nurse where NURSE_ID='$nurseid'";
			$rr=$obj->query($steQuery);
			$r=$obj->fetch();
	?>
	<html>
	<head>
		<title>Edit Nurses</title>
		<link rel="stylesheet" href="css/group.css">
		<script>
			
		</script>
	</head>
	<body>
				   <div id="header">
					    <img src="logo.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	       <li><a class="selected" href="#">Dashboard</a></li>
	         	  	       <li><a href="group.html">Home</a></li>
	         	  	       <li><a href="usersSearch.php">Search</a></li>
	         	  	       <li><a href="editClinic.php">Edit</a></li>
	         	  	       <li><a href="view.php">View</a></li>
	         	  	       <li><a href="addPatient.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
								  <b>EDIT NURSES TABLE</b>
									
								</div><br><br>
				
				
					<div id="divContent">
						
						<form action="" method="GET" onsubmit='validate()'>
				<input type="hidden" name="nurseid" value="<?php echo $r['NURSE_ID']?>">
				<div>NURSE_ID: <input type="text" name="nurseid" value="<?php echo $r['NURSE_ID'] ?>"/></div><br>
				<div>USERNAME: <input type="text" name="username" value="<?php echo $r['USERNAME'] ?>"/></div><br>
				<div>Firstname: <input type="text" name="fname" value="<?php echo $r['FIRST_NAME'] ?>"/></div><br>
				<div>Lastname: <input type="text" name="lname" value="<?php echo $r['LAST_NAME'] ?>"/></div><br>
				<div>EMAIL: <input type="text" name="email" value="<?php echo $r['EMAIL'] ?>"/></div><br>
				<div>PHONE: <input type="text" name="phone" value="<?php echo $r['PHONE'] ?>"/></div>
				<input type="submit" name="mod" value="Edit">
				 
			</form>
				</div>
			</div>
		</div>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	</body>
</html>	
			
	<?php
	   }
	   }
		if(isset($_REQUEST['mod'])){
		$obj = new users();
		$nurseid=$_REQUEST['nurseid'];
		$username=$_REQUEST['username'];
		$firstname=$_REQUEST['fname'];
		$lastname=$_REQUEST['lname'];
		$email=$_REQUEST['email'];
		$phone=$_REQUEST['phone'];
		$re=$obj->editNursesInfo($nurseid,$username,$firstname,$lastname,$email,$phone);
		if(!$re){
			echo "error updating";
		}else{
			echo "successfully updated";
			header ("Location:editClinic.php");
	   }
	   }
	   else if(isset($_REQUEST['code'])&& isset($_REQUEST['INSURANCE_ID'])){
		    $obj = new users();
		    $insuranceid=$_REQUEST['INSURANCE_ID'];
			$code=$_REQUEST['code'];
			if($code==5){
		    $steQuery="select * from insurance where INSURANCE_ID='$insuranceid'";
		    $rr=$obj->query($steQuery);
		    $r=$obj->fetch();
     ?>
	 <html>
	<head>
		<title>Edit Insurance</title>
		<link rel="stylesheet" href="css/group.css">
		<script>
			
		</script>
	</head>
	<body>
				   <div id="header">
					    <img src="logo.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	       <li><a class="selected" href="#">Dashboard</a></li>
	         	  	       <li><a href="group.html">Home</a></li>
	         	  	       <li><a href="usersSearch.php">Search</a></li>
	         	  	       <li><a href="view.php">Edit</a></li>
	         	  	       <li><a href="addPatient.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
								  <b>EDIT INSURANCE TABLE</b>
									
								</div><br><br>
				
					<div id="divContent">
						
						<form action="" method="GET" onsubmit='validate()'>
			<div>INSURANCE_ID: <input type="number_format" name="insuranceid" value="<?php echo $r['INSURANCE_ID'] ?>"/></div><br>
			<div>INSURANCE_TYPE: <input type="text" name="type" value="<?php echo $r['INSURANCE_TYPE'] ?>"/></div>
			<input type="submit" name="date" value="Edit">
			 
		</form>
				</div>
			</div>
		</div>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	</body>
</html>	
		
	<?php
       }
	   }
       if(isset($_REQUEST['date'])){
	   $obj = new users();
	   $insuranceid=$_REQUEST['insuranceid'];
	   $insurance=$_REQUEST['type'];
	
	   $re=$obj->editInsuranceInfo($insuranceid,$insurance);
	   print_r ($obj);
	   if(!$re){
		echo "error updating";
	   }else{
		echo "successfully updated";
		header ("Location:editClinic.php");
	   }
       }
	?>
		

