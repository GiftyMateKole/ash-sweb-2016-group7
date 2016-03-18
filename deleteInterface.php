<html>
	<head>
		<title>Add New User</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
					<form action="" method="GET">
						<input type="text" name="txtSearch">
						<input type="submit" value="search" >
			</div>
			</form>		
			<?php

	//1) Create object of users class
	include_once("Info.php");
	$new = new Info();
	
	//2) Call the object's getUsers method and check for error
	if(isset($_REQUEST['txtSearch'])){
		$var1 = strcmp("patient",$_REQUEST['txtSearch']);
		if($var1 == 0){
		$r=$new->searchUsers($_REQUEST['txtSearch']);
		}
	else{
		$r=$new->getPatient();
	}
	
	if(!$r){
		echo "Error";
	}
	
	//3) show the result
	echo "<table border=\"1\">";
	echo "<tr><td>STUDENT_ID</td><td>FIRSTNAME</td><td>LASTNAME</td><td>GENDER</td><td>AGE</td><td>PHONE</td><td>EMAIL</td>
	<td>INSURANCE_ID</td><td>LOCATION</td></tr>";
	while($row=$new->fetch()){
		$userCD = $row['STUDENT_ID'];
		echo "<tr>";
		echo "<td>{$row['STUDENT_ID']}</td>";
		echo "<td>{$row['FIRSTNAME']}</td>";
		echo "<td>{$row['LASTNAME']}</td>";
		echo "<td>{$row['GENDER']}</td>";
		echo "<td>{$row['AGE']}</td>";
		echo "<td>{$row['PHONE']}</td>";
		echo "<td>{$row['EMAIL']}</td>";
		echo "<td>{$row['INSURANCE_ID']}</td>";
		echo "<td>{$row['LOCATION']}</td>";
		echo '<td><a href="Del.php?uc='.$row['STUDENT_ID'].'">Delete</a></td>';
		echo "</tr>";
	}
	}
	?>
