	<?php
	$connect = mysql_connect("localhost","root","");
	if($connect){
		mysql_select_db("ashesiclinic",$connect);
	}
	if(isset($_POST['buttonsave1'])){
		$sql="INSERT INTO diagnosis(DIAGNOSIS_ID,DISEASE_NAME,TIME,DRUGS_ADMINISTERED,ADDRESS,PHONE)
			  VALUES('{$_POST[hospitalname]}','{$_POST[address]}',
			  '{$_POST[phone]}')";
			  $result = mysql_query($sql);
			  if($result)
			  {
				  echo "Successfully insert";
			  }
			  exit();
	}

	if(isset($_POST['editvalue'])){
		$sql="select DIAGNOSIS_ID,DISEASE_NAME,TIME,DRUGS_ADMINISTERED,diagnosis.STUDENT_ID,
			diagnosis.NURSE_ID,diagnosis.HOSPITAL_ID 
			from diagnosis WHERE DIAGNOSIS_ID='{$_POST['id']}'";
		$row = mysql_query($sql);
		$rows = mysql_fetch_object($row);
		
		header("Content-type:text/x-json");
		echo json_encode($rows);
		exit();
	}
	
	//code update
	if(isset($_POST['update'])){
		/*update diagnosis,patient set
		                DIAGNOSIS_ID='$diagnosisid',
						DISEASE_NAME='$diseasename',
						TIME ='$time',
						DRUGS_ADMINISTERED='$drugs',
						NURSE_ID='$nurse',
						HOSPITAL_ID='$hospital'
						where diagnosis.STUDENT_ID='$student'";
						 id            : id,
						  updiseasename : diseasenames,
						  updrugs       : drugs,
						  upnursename   : nursenames,
						  uphostel      : hostel,
						  upstudentname : studentname,
						  upphone       : phone,
						  uphospital    : hospiatl*/
		$sql = "UPDATE diagnosis,patient
		      SET
			     DIAGNOSIS_ID        = '{$_POST['id']}',
				 DISEASE_NAME        = '{$_POST['updiseasename']}',
				 DRUGS_ADMINISTERED  = '{$_POST['updrugs']}',
				 USERNAME            = '{$_POST['upnursename']}',
				 LOCATION            = '{$_POST['uphostel']}',
				 FIRSTNAME           = '{$_POST['studentname']}',
				 PHONE               = '{$_POST['upphone']}',
				 NAME                = '{$_POST['uphospital']}'
				 WHERE diagnosis.STUDENT_ID ='{$_POST['id']}'";
		$res = mysql_query($sql);
		if($res){
			echo "Successfully updated";
		}
	}
    //code delete 
	if(isset($_POST['deletes'])){
		$sql = mysql_query("DELETE FROM hospital WHERE HOSPITAL_ID = '{$_POST['id']}'");
		if($sql){
			echo "Success";
		}
	}
	//end
	
	if(isset($_POST['showtable'])){
		$sql = $sql="select DIAGNOSIS_ID,diagnosis.DISEASE_NAME, diagnosis.TIME, diagnosis.DRUGS_ADMINISTERED, 
		nurse.USERNAME,hospital.NAME,LOCATION,patient.FIRSTNAME,patient.AGE,
		patient.PHONE from diagnosis left join nurse on diagnosis.NURSE_ID=nurse.NURSE_ID
		left join patient on diagnosis.STUDENT_ID=patient.STUDENT_ID left join hospital on diagnosis.HOSPITAL_ID=hospital.HOSPITAL_ID";
		$result = mysql_query($sql);
			echo "<thead>
					<th>Diagnosis_Id</th>
					<th>Disease Name</th>
				    <th>Time Recorded</th>
				    <th>Drugs Administered</th>
				    <th>Nurse</th>
					<th>Hostel</th>
					<th>Student</th>
					<th>PHONE NUMBER</th>
				    <th>REFERALS</th>
					<th>Action</th>
				</thead>";
		while($row=mysql_fetch_object($result)){
			while($row=mysql_fetch_object($result)){
			echo "<tr>
					<td>$row->DIAGNOSIS_ID</td>
					<td>$row->DISEASE_NAME</td>
					<td>$row->TIME</td>
					<td>$row->DRUGS_ADMINISTERED</td>
					<td>$row->USERNAME</td>
					<td>$row->LOCATION</td>
					<td>$row->FIRSTNAME</td>
					<td>$row->PHONE</td>
					<td>$row->NAME</td>
					<td><a ide='$row->DIAGNOSIS_ID' class='edit' href='#?ide=$row->DIAGNOSIS_ID'>Edit</a>|
						  <a idd='$row->DIAGNOSIS_ID' class='delete' href='#?idd=$row->DIAGNOSIS_ID'>Delete</a></td>
				 </tr>";
		}
		exit();
		
	}
	}
	?>
	
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<div id="testforajax"><br><br>
		<tr>
			<input type="hidden" value="" id="id" name="id" />
			<td>Disease Name</td>
			<td>:</td>
			<td><input type="text" id="diseasename" name="diseasename" value="<?php echo $rows->DISEASE_NAME; ?>"></td>
	        <td>Time</td>
			<td>:</td>
			<td><input type="text" id="time" name="time" value="<?php echo $rows->TIME; ?>"></td>
		    <td>Drugs</td>
			<td>:</td>
			<td><input type="text" id="drugs" name="drugs" value="<?php echo $rows->DRUGS_ADMINISTERED; ?>"></td>
			<td>Nurse</td>
			<td>:</td>
			<td><input type="text" id="nurse" name="nurse" value="<?php echo $rows->USERNAME; ?>"></td>
			<td>Hostel</td>
			<td>:</td>
			<td><input type="text" id="hostel" name="hostel" value="<?php echo $rows->LOCATION; ?>"></td>
			<td>Student</td>
			<td>:</td>
			<td><input type="text" id="studentname" name="studentname" value="<?php echo $rows->FIRSTNAME; ?>"></td>
			<td>Phone</td>
			<td>:</td>
			<td><input type="text" id="phone" name="phone" value="<?php echo $rows->PHONE; ?>"></td>
			<td>Hospital</td>
			<td>:</td>
			<td><input type="text" id="hospital" name="hospital" value="<?php echo $rows->NAME; ?>"></td>
		</tr>
		<input type="button" value="Save" id="save">
		<input type="button" value="Update" id="update">
	</div><br><br>
		<table border="1">
			
			 <tbody id="showdata">
			 
			 </tbody>
		</table>
	<div>
	</div>
	<script type="text/javascript">
		  $(function(){
			  //create ajax insert record
			  showdata();
			  
			  //create ajax update
			  $('#update').click(function(){
				  var id = $('#id').val()-0;
				  var diseasenames = $('#diseasename').val();
				  var drugs = $('#drugs').val();
				  var nursenames = $('#nurse').val();
				  var hostel = $('#hostel').val();
				  var studentname = $('#studentname').val();
				  var phone = $('#phone').val();
				  var hospital = $('#hospital').val();
				  
				  
				  $.ajax({
					  url : "index.php",
					  type: "POST",
					  async: false,
					  data : {
						  update        : 1,
						  id            : id,
						  updiseasename : diseasenames,
						  updrugs       : drugs,
						  upnursename   : nursenames,
						  uphostel      : hostel,
						  upstudentname : studentname,
						  upphone       : phone,
						  uphospital    : hospiatl
					  },
					  success:function(up){
						  alert("Success Update");
						  $('input[type=text]').val('');
						  showdata();
					  }
				  });
			  });
			  
			  //delete record
			   $('body').delegate('.delete','click',function(){
				  var IdDelete = $(this).attr('idd');
				  var test = window.confirm("Do you want to delete this record");
				  if(test)
				  {
					  {
						  $.ajax({
						  url  : "index.php",
						  type : "POST",
						  async: false,
						  data : {
							      deletes : 1,
							      id      : IdDelete
						         },
						  success:function(){
							 alert("Success Delete");
							 showdata();
						         }
					     });  
				       }
				   }
			   });
			  //end
			  
			  $('body').delegate('.edit','click',function(){
				  var IdEdit = $(this).attr('ide');
				  $.ajax({
					  url:"index.php",
					  type:"POST",
					  datatype:"JSON",
					  data :{
						  editvalue : 1,
						  id        : IdEdit
					  },
					  success:function(show)
					  {
						  $('#id').val(show.DIAGNOSIS_ID);
						  $('#diseasename').val(show.DISEASE_NAME);
						  $('#drugs').val(show.DRUGS_ADMINISTERED);
						  $('#nurse').val(show.USERNAME);
						  $('#hostel').val(show.LOCATION);
						  $('#studentname').val(show.FIRSTNAME);
						  $('#phone').val(show.PHONE);
						  $('#hospital').val(show.NAME);
					  }
					  
				  });
			  });
			  
			  $('#save').click(function(){
			  var  namehospital = $('#hospitalname').val();
			  var  addresshospital = $('#address').val();
			  var  phonehospital = $('#phone').val();
			  $.ajax({
				  url  :"index.php",
				  type :"POST",
				  async:false,
				  data :{
						 buttonsave   : 1,
						 hospitalname  : namehospital,
						 address       : addresshospital,
						 phone        : phonehospital
					   },
				  success:function(result)
				  {
					alert("success");
					showdata();				
				  }
			  });
		  });
	});
	  function showdata()
	  {
		  $.ajax({
			  url:"index.php",
			  type:"POST",
			  async:false,
			  data:{
				  showtable : 1
			  },
			  success:function(re)
			  {
				  $('#showdata').html(re);
			  }
		  });
	  }
	</script>
			
			
			
			