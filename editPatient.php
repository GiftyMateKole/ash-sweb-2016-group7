	<?php
	include_once("users.php");
	$obj=new users();
	/**
	*php code to display tables
	*/
	if(isset($_POST['opts'])){
		if(isset($_POST['showtable'])){
		    $table = $_POST['opts'];
			/**
	        *php code to display patient table
	        */
	        if($table=='Patient'){
			 echo "Double click on patient records to edit ";
		      $r=$obj->Patient();
			    if (!$r){
			      echo "Error occurred when retrieving information";  
		        }
	      echo "<table>";
	        	echo "<tr bgcolor= #b3b3ff>
			    <th>Student_Id</th>
			    <th>Gender</th>
			    <th>Age</th>
				<th>Location</th>
				<th>Email</th>
			 </tr>";
		$i=1;
		while($row=$obj->fetch()){
			if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
			echo '<tr id="'.$row['STUDENT_ID'].'" bgcolor= $TRcolor>';
			echo '<td class="sd" bgcolor= #b3b3ff>'.$row['STUDENT_ID'].'</td><td class="gender">'.$row['GENDER'].'</td>
			      <td class="age">'.$row['AGE'].'</td><td class="location">'.$row['LOCATION'].'</td>
				  <td class="email">'.$row['EMAIL'].'</td>';
			echo '</tr>';
		}
		 echo "</table>";
		 exit();
		}
		/**
	    *php code to display diagnosis table
	    */
		else if($table=="Diagnosis"){
		echo "<table>";
		 echo "You can`t edit diagnosis here";
		    $r=$obj->Diagnosis();
			if (!$r){
			  echo "Error occurred when retrieving information";  
		    }
	    echo "<tr bgcolor= #b3b3ff>
					<th>Diagnosis_Id</th>
					<th>Disease Name</th>
				    <th>Time Recorded</th>
				    <th>Drugs Administered</th>
					<th>Student</th>
				    <th>Nurse</th>
				    <th>REFERALS</th>
				</tr>";
		$i=1;
	    while ($row=$obj->fetch()){
		    if ($i % 2 != 0){
			     $TRcolor = "#e5e5ff";
			}else{
				$TRcolor = "#4dffff";  
			}
			echo '<tr id="'.$row['DIAGNOSIS_ID'].'" bgcolor= $TRcolor>';
			echo '<td bgcolor= #b3b3ff class="did">'.$row['DIAGNOSIS_ID'].'</td><td class="diseasename">'.$row['DISEASE_NAME'].'</td>
			      <td class="time">'.$row['TIME'].'</td><td class="drugs">'.$row['DRUGS_ADMINISTERED'].'</td>
				  <td class="sd">'.$row['STUDENT_ID'].'</td><td class="nid">'.$row['NURSE_ID'].'</td>
				  <td class="nid">'.$row['HOSPITAL_ID'].'</td>';
			echo '</tr>';
				 $i++;
		}
		echo "</table>";
		exit();
		}
		/**
	    *php code to display nurses table
	    */
	     else if($table=="Nurse"){
		 echo "You are not allowed to edit nurses";
		$r=$obj->getNursesInfo();
			if (!$r){
			echo '{"result":0,"message":"Error occurred when retrieving information"}'; 
		}
	  echo "<table>";
	     echo "<tr bgcolor= #b3b3ff>
				  <th>Nurse_Id</th>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Email</th>
				  <th>Phone</th>
			 </tr>";
		$i=1;
		while($row=$obj->fetch()){
			if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
			echo '<tr id="'.$row['NURSE_ID'].'" bgcolor= $TRcolor>';
			echo '<td class="did" bgcolor= #b3b3ff>'.$row['NURSE_ID'].'</td><td class="fname">'.$row['FIRST_NAME'].'</td>
			      <td class="lname">'.$row['LAST_NAME'].'</td><td class="email">'.$row['EMAIL'].'</td>
				  <td class="fon">'.$row['PHONE'].'</td>';
			echo '</tr>';
				 $i++;
		}
		echo "</table>";
		exit();
		}
		/**
	    *php code to display hospital table
	    */
		else if($table=="Hospital"){
		echo "You are not allowed to edit Hospitals";
		echo "<table>";
		$r=$obj->getHospital();
            if (!$r){
				echo '{"result":0,"message":"Error occurred when retrieving information"}';
			}
	  echo "<tr bgcolor= #b3b3ff>
				  <th>Hospital_Id</th>
				  <th>Hospital Name</th>
				  <th>Address</th>
				  <th>Phone</th>
			 </tr>";
		$i=1;
		while ($row=$obj->fetch()){
			if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
				echo '<tr id="'.$row['HOSPITAL_ID'].'" bgcolor= $TRcolor>';
			echo '<td class="did" bgcolor= #b3b3ff>'.$row['HOSPITAL_ID'].'</td><td class="fname">'.$row['NAME'].'</td>
			      <td class="lname">'.$row['ADDRESS'].'</td><td class="email">'.$row['PHONE'].'</td>';
			echo '</tr>';
				 $i++;
		}
		exit();
		echo "</table>";
		}
		/**
	    *php code to display nurses table
	    */
		else if($table=="Insurance"){
		echo "You are not allowed to edit students Insurance policy";
	     echo "<table>";
	     $r=$obj->getInsuranceInfo();
		 if (!$r){
		   echo '{"result":0,"message":"Error occurred when retrieving information"}';
		 }
		echo "<tr bgcolor= #b3b3ff>
				  <th>Insurance_Id</th>
				  <th>Insurance Type</th>
			 </tr>";
		$i=1;
		while ($row=$obj->fetch()){
			if ($i % 2 != 0){
			    $TRcolor = "#e5e5ff";
		    }else{
				$TRcolor = "#4dffff";  
				}
			echo '<tr id="'.$row['INSURANCE_ID'].'" bgcolor= $TRcolor>';
			echo '<td class="did" bgcolor= #b3b3ff>'.$row['INSURANCE_ID'].'</td><td class="fname">'.$row['INSURANCE_TYPE'].'</td>';
			echo '</tr>';
				 $i++;
		}
		echo "</table>";
		exit();
		}
		}
	}
	?>
	<html>
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<link rel="stylesheet" href="css/group.css">
	<body>
				   <div id="header">
					    <img src="http://images.forbes.com/media/2012/09/28/0928_ashesi-university-non-profit_150x150.jpg" id="logo">
				        <b>Ashesi Clinic Management System</b>
					</div>
					<div id="container">
	                 <div class="sidebar">
	         	        <ul id="nav">
	         	  	        <li><a class="selected" href="#">Dashboard</a></li>
	         	  	  <li><a href="home.html">Home</a></li>
	         	  	  <li><a href="trialSearch.php">Search</a></li>
	         	  	  <li><a href="index2.php">Edit</a></li>
	         	  	  <li><a href="addPatientTrial.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
									<b>VIEW AND EDIT RECORDS</b>
								</div><br><br>
	<div class="status" id="divStatus" style="center font-weight=10 font-size=20">Select to view and edit patient records</div> 
		<table class='reportTable' id="tableUsers" >
		<select id="selectTable">
			<option>Select Table</option>
			<option value="Patient">Patient</option>
			<option value="Nurse">Nurse</option>
			<option value="Hospital">Hospital</option>
			<option value="Diagnosis">Diagnosis</option>
			<option value="Insurance">Insurance</option>
		</select>
			<tbody id="showdata">
			</tbody>
		</table>
		 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
</body>	
</html>   
			
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
    <script type="text/javascript" src="edit.js"></script>
	
			
			