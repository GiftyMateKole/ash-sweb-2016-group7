<html>
	<head>
	<title>Ashesi University</title>
	<link rel="stylesheet" type="text/css" href="css/group.css" />
	<script src="js/jquery-1.12.1.js"></script>
	
	<script>
	var tableRow="";
	
		/**
		* making an Ajax call to server to get details of patient
		*@param int STUDENT_ID which stores id of the patient
		* sending a request to an Ajax page
		*/
		function delPatient(row,STUDENT_ID){
				tableRow = row;
	
			var ajaxPageUrl = "Ajax_2.php?cmd=1&uc="+STUDENT_ID;
			if (confirm('Are you sure you want to delete this information')){
				
			$.ajax(ajaxPageUrl,
			{
				async:true,
				complete:delPatientComplete
			}
			);
			}
		}
		
		/**
		*receving a request and sending a response
		*@param boolean status which return success if true and not if failure
		*@param string xhr which returns message to the client when info is deleted or not
		*/
		function delPatientComplete(xhr,status){
			if(status!= "success"){
				divStatus.innerHTML = "error while deleting page";
                 return;				 
			}
				var obj = $.parseJSON(xhr.responseText);
				if (obj.result==0){
				divStatus.innerHTML = obj.message;
				}
				
				var i = tableRow.parentNode.parentNode.rowIndex;
				document.getElementById("patientTable").deleteRow(i);
		}
		
		/**
		*making an Ajax call to server to get details of nurse
		*@param int NURSE_ID which stores nurse id
		*sending a request to an Ajax page
		*/
		function delNurse(row,NURSE_ID){
				tableRow = row;
				
			var ajaxUrl = "Ajax_2.php?cmd=2&un="+NURSE_ID;
			if (confirm('Are you sure you want to delete this information')){
			$.ajax(ajaxUrl,
			{
				async:true,
				complete:delNurseComplete
			}
			);
			}
		}
		
		/**
		*receving a request and sending a response
		*@param boolean status which return success if true and not if failure
		*@param string xhr which returns message to the client when info is deleted or not
		*/
		function delNurseComplete(xhr,status){
			if(status!= "success"){
				divStatus.innerHTML = "error while deleting page";
                 return;				 
			}
				var obj2 = $.parseJSON(xhr.responseText);
				if (obj2.result==0){
				var text =document.getElementById("divStatus");
				text.innerHTML = obj2.message;
				}
				
				//code to delete the row from the HTML table
				var a = tableRow.parentNode.parentNode.rowIndex;
				document.getElementById("nurseTable").deleteRow(a);
		}
		
				/**
		*making an Ajax call to server to get details of diagnosis
		*@param int DIAGNOSIS_ID which contains the id of diagnosis 
		*sending a request to an Ajax page
		*/
		function delDiagnosis(row,DIAGNOSIS_ID){
				tableRow = row;
				
			var theUrl = "Ajax_2.php?cmd=3&ud="+DIAGNOSIS_ID;
			if (confirm('Are you sure you want to delete this information')){
			$.ajax(theUrl,
			{
				async:true,
				complete:delDiagnosisComplete
			}
			);
			}
		}
		
		/**
		*receving a request and sending a response
		*@param boolean status which return success if true and not if failure
		*@param string xhr which returns message to the client when info is deleted or no
		*/
		function delDiagnosisComplete(xhr,status){
			if(status!= "success"){
				divStatus.innerHTML = "error while deleting page";
                 return;				 
			}
				var obj3 = $.parseJSON(xhr.responseText);
				if (obj3.result==0){
				divStatus.innerHTML = obj3.message;
				}
				
				//code to delete the row from the HTML table
				var x = tableRow.parentNode.parentNode.rowIndex;
				document.getElementById("diagnosisTable").deleteRow(x);
		}	
		
</script>
	
	</head>
	<body>
	     <div id="header">
                   <img src="http://images.forbes.com/media/2012/09/28/0928_ashesi-university-non-profit_150x150.jpg" id="logo">
				   <b>Ashesi Clinic Management System</b>
				   <div id="divStatus">
						status message
					</div>
				   
         </div>
	    
	     <div id="container">
	         <div class="sidebar">
	         	  <ul id="nav">
					   <li><a class="selected" href="#">Dashboard</a></li>
	         	  	  <li><a href="home.php">Home</a></li>
	         	  	  <li><a href="trialSearch.php">Search</a></li>
	         	  	  <li><a href="view.php">Edit</a></li>
	         	  	  <li><a href="addPatientTrial.php">Add</a></li>
	         	  </ul>
	         </div>
			 
	     	 <div id="search">
	              
				  <table class='reportTable' id="tableUsers" >
				  
		<tr class='header'>
		
		<form action="" method="GET">
						<input type="text" name="txtSearch">
						<input type="text" name="input">
						<input type="submit" value="search" >
						</form>	
						
			</div>
			
