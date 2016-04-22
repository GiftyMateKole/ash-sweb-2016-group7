<html>
	<head>
	<script>
	var tableRow="";
	/*function delPatient(STUDENT_ID){
		 tableRow = row;
			//sending a request to an Ajax page
			
			var ajaxPageUrl = "Ajax_2.php?cmd=1&uc="+STUDENT_ID;
			$.ajax(ajaxPageUrl,
			{
				async:true,
				complete:delPatientComplete
			}
			);
		}
		
		function delPatientComplete(xhr,status){
			if(status!= "true"){
				divStatus.innerHTML = "error while deleting page";
                 return;				 
			}
				var obj = parseJSON(xhr.responseText)
				divStatus.innerHTML = obj.message;
				
				//code to delete the row from the HTML table
				var i = tableRow.parentNode.parentNode.rowIndex;
				document.ElementById("patientTable").deleteRow(i);
				
		}*/
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
	
	//  Object of info class
	include_once("Info.php");
	$new = new Info();
	
	// Calling the object's  method searchUsers & getPatient method and checking for error
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
	
	// Displaying the result
	echo "<table id = 'patientTable' border=\"1\">";
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
		echo "<td><span onclick='delPatient(this,{$row['STUDENT_ID']})'><a href=#>Delete</a></span></td>";
		echo "</tr>";
	}
	}
	echo "</table>";
	
?>						
					</div>
				</td>
			</tr>
		</table>
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<script type="text/javascript" src = "user_Ajax.js" ></script>
	</body>
</html>	
