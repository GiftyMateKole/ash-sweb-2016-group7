			<html>
				<head>
					<title>Search Information</title>
					<link rel="stylesheet" href="css/group.css">
					<script>
						<!--add validation js script here
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
									<b>VIEW AND EDIT RECORDS</b>
								</div><br><br>
								
								<div id="records"style="width:980px;">
			<div style="float: left; width: 190px"> 
			<form id="label" action="editClinic.php" method="post">
				<input type="submit" name = "Diagnostics" value="Display_and_EDIT_ALL_Cases" >
			</form>
			</div>
			<div style="float: left; width: 170px"> 
				<form id="label" action="editClinic.php" method="post">
				 <input type="submit" name = "Hospital" value="Display_and_EDIT_Hospital" >
				</form>
			</div>
			<div style="float: left; width: 200px"> 
				<form id="label" action="editClinic.php" method="post">
				 <input type="submit" name = "Patient" value="Display_and_EDIT_ALL_Patients" >
				</form>
			</div>
			<div style="float: left; width: 195px"> 
				<form id="label" action="editClinic.php" method="post">
				 <input type="submit" name = "Nurses" value="Display_and_EDIT_ALL_Nurses" >
				</form>
			</div>
			<div style="float: left; width: 150px"> 
				<form id="label" action="editClinic.php" method="post">
				 <input type="submit" name = "Insurance" value="Display_and_EDIT_Insurance" >
				</form>
			</div>
			</div>
			<div id="divStatus" style="float:center; width:225px">
					<pre style="float: left; color:black">TABLES AVAILABLE ARE: Diagnosis - Patient - Nurses - Hospital - Insurance </pre>	

			
			<?php

				//1) Create object of users class
				include_once("users.php");
				$obj=new users();
				$result="";
				if (isset($_REQUEST['Diagnostics'])){
					$r=$obj->getAllDiagnosis();
					if (!$r){
					echo "Error occurred when retrieving information";  
				}
				echo "<table id=diagnosis table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>";
					echo "<tr bgcolor= #b3b3ff>
					            <th>DIAGNOSTICS ID</th>
						        <th>DISEASE NAME</th>
						        <th>TIME</th>
						        <th>DRUGS ADMINISTERED</th>
				                <th>NURSE'S FIRSTNAME</th>
						        <th>NURSE'S LASTNAME</th>
						        <th>HOSTEL</th>
						        <th>STUDENT FNAME</th>
						        <th>STUDENT LNAME</th>
						        <th>PHONE NUMBER</th>
				                <th>REFERALS</th>
						        <th>Delete</th>
						        <th>Edit</th>
					    </tr>";
				$i=1;
	         while ($row=$obj->fetch()){
					$diagnosisID=$row['DIAGNOSIS_ID'];
					if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
					echo "<tr class=\"display\" bgcolor=$TRcolor><td bgcolor= #b3b3ff>{$row['DIAGNOSIS_ID']}</td><td>{$row['DISEASE_NAME']}</td><td>{$row['TIME']}</td>
						   <td>{$row['DRUGS_ADMINISTERED']}</td><td>{$row['FIRST_NAME']}</td><td>{$row['LAST_NAME']}</td>
						   <td>{$row['LOCATION']}</td><td>{$row['FIRSTNAME']}</td><td>{$row['LASTNAME']}</td><td>{$row['PHONE']}</td>
						   <td>{$row['NAME']}</td><td><a href=Del.php?uc=$diagnosisID>Delete</a></td>
						   <td><a href=edit.php?code=1&DIAGNOSIS_ID=$diagnosisID>Edit</a></td></tr>";
						   $i++;
				}
				echo "</table>";	
				}
				 
				 
				 if (isset($_REQUEST['Hospital'])){
					$r=$obj->getHospital();
					if (!$r){
					echo "Error occurred when retrieving information";
				}
				echo "<table id=hospital table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>";
					echo "<tr bgcolor= #b3b3ff><th> HOSPITAL_ID</th><th>HOSPITAL NAME</th><th>ADDRESS</th><th>PHONE</th>
					<th>Delete</th><th>Edit</th></tr>";
					$i=1;
					while ($row=$obj->fetch()){
						$hospitalID=$row['HOSPITAL_ID'];
						if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
						echo "<tr class=\"display\" bgcolor=$TRcolor>
						<td tr bgcolor= #b3b3ff>{$row['HOSPITAL_ID']}</td>
						<td>{$row['NAME']}</td>
					    <td>{$row['ADDRESS']}</td>
						<td>{$row['PHONE']}</td>
						<td><a href=Del.php?HOSPITAL_ID=$hospitalID>Delete</a></td>
						<td><a href=edit.php?code=2&HOSPITAL_ID=$hospitalID>Edit</a></td></tr>";
						  $i++;
					}
					echo "</table>";	
				}
				
				if (isset($_REQUEST['Patient'])){
					$r=$obj->getPatientInfo();
					if (!$r){
						echo "Error occurred when retrieving information";
					}
							echo "<table id=patient table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>";
				echo "<tr bgcolor= #b3b3ff><th>STUDENT_ID</th><th>FIRSTNAME</th><th>LASTNAME</th>
				<th>GENDER</th><th>AGE</th><th>PHONE NUMBER</th><th>EMAIL</th><th>INSURANCE_TYPE</th><th>LOCATION</th>
				<th>Delete</th><th>Edit</th></tr>";
				$i=1;
				while ($row=$obj->fetch()){
					$studentID=$row['STUDENT_ID'];
					if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
					echo "<tr class=\"display\" bgcolor=$TRcolor>
					<td bgcolor= #b3b3ff>{$row['STUDENT_ID']}</td>
					<td>{$row['FIRSTNAME']}</td>
					<td>{$row['LASTNAME']}</td>
					<td>{$row['AGE']}</td>
					<td>{$row['GENDER']}</td>
					<td>{$row['PHONE']}</td>
					<td>{$row['EMAIL']}</td>
					<td>{$row['INSURANCE_TYPE']}</td><td>{$row['LOCATION']}</td>
					<td><a href=Del.php?STUDENT_ID=$studentID>Delete</a></td>
					<td><a href=edit.php?code=3&STUDENT_ID=$studentID>Edit</a></td></tr>";
					 $i++;
				}
				echo "</table>";
				}
				
				if (isset($_REQUEST['Nurses'])){
					$r=$obj->getNursesInfo();
					
					if (!$r){
						echo "Error occurred when retrieving information";
					}
							echo "<table id=nurses table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>";
				echo "<tr bgcolor= #b3b3ff><th>NURSE_ID</th><th>USERNAME</th><th>FIRSTNAME</th>
				<th>LASTNAME</th><th>EMAIL</th><th>PHONE NUMBER</th><th>Delete</th><th>Edit</th></tr>";
				$i=1;
				while ($row=$obj->fetch()){
					$nurseID=$row['NURSE_ID'];
					if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
					echo "<tr class=\"display\" bgcolor=$TRcolor>
					<td bgcolor= #b3b3ff>{$row['NURSE_ID']}</td>
					<td>{$row['USERNAME']}</td>
					<td>{$row['FIRST_NAME']}</td>
					<td>{$row['LAST_NAME']}</td>
					<td>{$row['EMAIL']}</td>
					<td>{$row['PHONE']}</td>
					<td><a href=Del.php?NURSE_ID=$nurseID>Delete</a></td>
					<td><a href=edit.php?code=4&NURSE_ID=$nurseID>Edit</a></td></tr>";
					$i++;
				}
				echo "</table>";
				}
				
				if (isset($_REQUEST['Insurance'])){
					$r=$obj->getInsuranceInfo();
					if (!$r){
						echo "Error occurred when retrieving information";
					}
							echo "<table id=insurance table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>";
				echo "<tr bgcolor= #b3b3ff><th>INSURANCE_ID</th><th>INSURANCE_TYPE</th><th>Delete</th><th>Edit</th></tr>";
				$i=1;
				while ($row=$obj->fetch()){
					$insuranceID=$row['INSURANCE_ID'];
					if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
					echo "<tr class=\"display\" bgcolor=$TRcolor>
					<td bgcolor= #b3b3ff>{$row['INSURANCE_ID']}</td>
					<td>{$row['INSURANCE_TYPE']}</td>
					<td><a href=Del.php?INSURANCE_ID=$insuranceID>Delete</a></td>
					<td><a href=edit.php?code=5&INSURANCE_ID=$insuranceID>Edit</a></td></tr>";
					$i++;
				}
				echo "</table>";
				}
				if (isset($_REQUEST['tableName'])){
					$result=strcmp("Patient",$_REQUEST['tableName']);
					if ($result==0){
					$r=$obj->searchPatient($_REQUEST['txtSearch']);
					 print_r ($obj);
					if (!$r){
					echo "Error occurred when retrieving information";
				}
				
				echo "<table border=\"1\">";
				echo "<tr><td>STUDENT_ID</td><td>FIRSTNAME</td><td>LASTNAME</td>
				<td>GENDER</td><td>GENDER</td><td>AGE</td><td>PHONE NUMBER</td><td>EMAIL</td><td>INSURANCE_TYPE</td><td>LOCATION</td></tr>";
				while ($row=$obj->fetch()){
					echo "<tr class=\"display\"><td>{$row['STUDENT_ID']}</td><td>{$row['FIRSTNAME']}</td>
					<td>{$row['LASTNAME']}</td><td>{$row['AGE']}</td><td>{$row['GENDER']}</td><td>{$row['AGE']}</td><td>{$row['PHONE']}</td>
					<td>{$row['EMAIL']}</td><td>{$row['INSURANCE_TYPE']}</td><td>{$row['LOCATION']}</td></tr>";
				}
				echo "</table>";
					 }
					 
				$result=strcmp("Diagnosis",$_REQUEST['tableName']);
					if ($result==0){
					$r=$obj->getDiagnosis($_REQUEST['txtSearch']);
					 
					if (!$r){
					echo "Error occurred when retrieving information";
				}
				echo "<table border=\"1\">";
					echo "<tr><td>DIAGNOSTICS ID</td><td>DISEASE NAME</td><td>TIME</td><td>DRUGS ADMINISTERED</td>
				<td>NURSE'S FIRSTNAME</td><td>NURSE'S LASTNAME</td><td>REFERALS</td><td>STUDENT FIRSTNAME</td>
				<td>STUDENT LASTNAME</td><td>PHONE NUMBER</td></tr>";
				while ($row=$obj->fetch()){
					echo "<tr class=\"display\"><td>{$row['DIAGNOSIS_ID']}</td><td>{$row['DISEASE_NAME']}</td>
					<td>{$row['TIME']}</td><td>{$row['DRUGS_ADMINISTERED']}</td><td>{$row['FIRST_NAME']}</td><td>{$row['LAST_NAME']}</td><td>{$row['NAME']}</td>
					<td>{$row['FIRSTNAME']}</td><td>{$row['LASTNAME']}</td><td>{$row['PHONE']}</td></tr>";
				}
				echo "</table>";	
				}
				}	
			?>				
							</div>
					</div>
					</div>
					 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
				</body>
			</html>	