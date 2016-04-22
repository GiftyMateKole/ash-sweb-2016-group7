	var tableRow="";
	
		function delPatient(row,STUDENT_ID){
				tableRow = row;
		 
		/**
		*sending a request to an Ajax page
		*/
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
				
				//code to delete the row from the HTML table
				var i = tableRow.parentNode.parentNode.rowIndex;
				document.getElementById("patientTable").deleteRow(i);
		}
