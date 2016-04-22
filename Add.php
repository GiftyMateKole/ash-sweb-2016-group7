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
			</html>
