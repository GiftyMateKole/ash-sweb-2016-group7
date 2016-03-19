<html>
	<head>
		<title>EditRecords</title>
		<link rel="stylesheet" href="style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Ashesi Health Center Health Records
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem"> <a href="nursesRecords.php">Nurses</a></div>
					<div class="menuitem"> <a href="patientRecords.php">Diagnosis</a></div>
					<div class="menuitem"> <a href="insurance.php">Insurance Info</a></div>
					<div class="menuitem">Complications</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
					</div>
				    <div id="divContent">
						<span class="clickspot"></span>
						<table id="tableExample" class="reportTable" width="100%">
							
<?php

	/** Create object of records class
	*/
	include_once ("records.php");
	$obj=new records();
	$r=$obj->getPatientRecords();
    
    if($r==false){
		echo "error getting users";
		
	}
	
	echo "<table border=2 width=70% cellpadding=5 cellspacing=5>
	     <tr bgcolor= #b3b3ff>
			 <th>PATIENT_ID</th>
			 <th>FIRSTNAME</th>
			 <th>LASTNAME</th>
			 <th>GENDER</th>
			 <th>DIAGNOSE_OF</th>
			 <th>DRUGS_ADMINISTERED</th>
			 <th>Time</th>
			 <th>PHYSICIAN</th>
			 <th>REFERREDTO</th>
			 <th>Edit</th>
	     </tr>";
	$i=1;
	while($row=$obj->fetch()){
		 if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
				
		echo "<tr bgcolor=$TRcolor>";
		     echo "<td>{$row['PATIENT_ID']}</td>";
			 echo "<td>{$row['FIRSTN']}</td>";
			 echo "<td>{$row['LASTN']}</td>";
			 echo "<td>{$row['GENDER']}</td>";
		     echo "<td>{$row['DISEASE_NAME']}</td>";
			 echo "<td>{$row['DRUGS_ADMINISTERED']}</td>";
			 echo "<td>{$row['TIME']}</td>";
			 echo "<td>{$row['USERNAME']}</td>";
			 echo "<td>{$row['HOSPITAL_ID']}</td>";
?>   
    <td><a href="editPatientRecords.php?PATIENT_ID=<?php echo $row['PATIENT_ID'];?>
	&DIAGNOSIS_ID=<?php echo $row['DIAGNOSIS_ID'];?>$NURSE_ID=<?php echo $row['NURSE_ID'];?>">Edit</a></td>
             
	<?php
		echo "</tr>";
		$i++;                                            
	}
	echo "</table>";
?>						
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
