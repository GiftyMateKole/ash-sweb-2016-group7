<html>
	<head>
		<title>Add Patient</title>
		<link rel="stylesheet" href="group.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			
			function addPatientComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error while adding patient";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
			}
			function addPatient(){
				var id = document.getElementsByName("student_id")[0].value;
				var fname = document.getElementsByName("fname")[0].value;
				var lname = document.getElementsByName("lname")[0].value;
				var age = document.getElementsByName("age")[0].value;
				var gender = document.getElementsByName("gender")[0].value;
				var location = document.getElementsByName("location")[0].value;
				var phone = document.getElementsByName("num")[0].value;
				var email = document.getElementsByName("email")[0].value;
				var insurance = document.getElementsByName("insurance")[0].value;
				
				var ajaxPageUrl="patientAjax.php?cmd=1&uc="+id+"&fname="+fname+"&lname="+lname+"&age="+age+
				"&gender="+gender+"&location="+location+"&phone="+phone+"&email="+email+"&insurance="+insurance;
				$.ajax(ajaxPageUrl,
{async:true,complete:addPatientComplete	}	
				);
			}
			</script>
			</head>
			<body>
	<div id="header">
                   <img src="logo.jpg" id="logo">
                   <img src="title-img.jpg" id="title">
				   <b>Ashesi Clinic Management System</b>
         </div>
	     <a class="mobile" href="#">MENU</a>
	     <div id="container">
	         <div class="sidebar">
	         	  <ul id="nav">
	         	  	  <li><a class="selected" href="#">Dashboard</a></li>
	         	  	  <li><a href="#">Home</a></li>
	         	  	  <li><a href="#">Search</a></li>
	         	  	  <li><a href="#">Edit</a></li>
	         	  	  <li><a href="#">View</a></li>
	         	  	  <li><a href="#">Add</a></li>
	         	  </ul>
	         </div>
	     	 <div class="content">
		<div class="status" id="divStatus">Ready</div>
		
					
			<div>Student Id:   <input type="text" name="student_id"/><br></div>
			<div>Firstname:   <input type="text" name="fname"/><br></div> 
			<div>Lastname:   <input type="text" name="lname"/><br></div>
			<div>Age:   <input type="text" name="age"/><br></div>
			<div>Gender:   <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female" checked>Female <br></div>
			<div>Location:   <select name="location">
			<option value="ON-CAMPUS">ON-CAMPUS</option>
			<option value="OFF-CAMPUS">OFF-CAMPUS</option>
			</select>
			<div>Phone Number:   <input type="text" name="num"/><br></div>
			<div>Email:   <input type="text" name="email"/></div>
			<div>Insurance ID:   <input type="text" name="insurance"/></div>
  
        <button value="Add" class="add" onclick="addPatient()">Add</button>
		 </div>
  <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
	         </div>
	      </div>
	</body>
			</html>
