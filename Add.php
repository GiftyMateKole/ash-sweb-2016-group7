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
			</script>
			</head>
			</html>
