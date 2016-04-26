	<?php
	$connect = mysql_connect("localhost","root","");
	if($connect){
		mysql_select_db("ashesiclinic",$connect);
	}
	

	if(isset($_POST['editvalue'])){
		$sql = "SELECT * FROM patient WHERE STUDENT_ID='{$_POST['id']}'";
		$row = mysql_query($sql);
		$rows = mysql_fetch_assoc($row);
		
		header("Content-type:text/x-json");
		echo json_encode($rows);
		exit();
	}
	
	//code update
	if(isset($_POST['update'])){
		$sql = "UPDATE patient
		      SET
				 FIRSTNAME  = '{$_POST['upfname']}',
				 LASTNAME  = '{$_POST['uplname']}',
				 GENDER    = '{$_POST['upgender']}',
				 PHONE     = '{$_POST['upphones']}',
				 INSURANCE_ID = '{$_POST['upinsurance']}',
				 LOCATION  = '{$_POST['uplocation']}',
				 EMAIL     = '{$_POST['upemail']}'
				 WHERE STUDENT_ID    ='{$_POST['id']}'";
		$res = mysql_query($sql);
		if($res){
			echo "Successfully updated";
		}
	}
    //code showtable 
	if(isset($_POST['showtable'])){
		$sql = "SELECT * FROM patient";
		$result = mysql_query($sql);
		echo "<thead table border=2 solid black cellspacing=5 cellpadding=5 bgcolor=#8080ff>
				  <th>Student_Id</th>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Gender</th>
				  <th>Phone</th>
				  <th>Insurance Id</th>
				  <th>Location</th>
				  <th>Email</th>
				  <th>Action</th>
			 </thead>";
			 $i=1;
		while($row=mysql_fetch_object($result)){
			if ($i % 2 != 0){
					$TRcolor = "#e5e5ff";
				}else{
					$TRcolor = "#4dffff";  
				}
			echo "<tr bgcolor=$TRcolor>
					  <td bgcolor= #b3b3ff>$row->STUDENT_ID</td>
					  <td>$row->FIRSTNAME</td>
					  <td>$row->LASTNAME</td>
					  <td>$row->GENDER</td>
					  <td>$row->PHONE</td>
					  <td>$row->INSURANCE_ID</td>
					  <td>$row->LOCATION</td>
					  <td>$row->EMAIL</td>
					  <td><a ide='$row->STUDENT_ID' class='edit' href='#?ide=$row->STUDENT_ID'>Edit</a>
				 </tr>";
				 $i++;
		}
		exit();
		
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
	         	  	  <li><a href="index.php">Edit</a></li>
	         	  	  <li><a href="addPatientTrial.php">Add</a></li>
	         	        </ul>
	                  </div>
							<div id="content">
								<div id="divStatus" class="status">
									<b>VIEW AND EDIT RECORDS</b>
								</div><br><br>
	<div class="optionsDiv"><br><br>
		<tr>
			<input type="hidden" value="" id="id" name="id" />
			<td>Diagnosis Id</td>
			<td>:</td>
			<td><input type="text" id="fname" name="fname" value="<?php echo $rows->FIRSTNAME; ?>"></td><br><br>
			<td>Last N</td>
			<td>:</td>
			<td><input type="text" id="lname" name="lname" value="<?php echo $rows->LASTNAME; ?>"></td><br><br>
			<td>Gender</td>
			<td>:</td>
			<td><input type="text" id="gender" name="gender" value="<?php echo $rows->GENDER; ?>"></td><br><br>
			<td>PHONE</td>
			<td>:</td>
			<td><input type="text" id="phone" name="phone" value="<?php echo $rows->PHONE; ?>"></td><br><br>
			<td>Insurance</td>
			<td>:</td>
			<td><input type="text" id="insurance" name="insurance" value="<?php echo $rows->INSURANCE_ID; ?>"></td><br><br>
			<td>Location</td>
			<td>:</td>
			<td><input type="text" id="location" name="location" value="<?php echo $rows->LOCATION; ?>"></td><br><br>
			<td>Email</td>
			<td>:</td>
			<td><input type="text" id="email" name="email" value="<?php echo $rows->EMAIL; ?>"></td>
		</tr><br>
		<input type="button" value="Update" id="update">
	</div><br><br>
	</div>
		<table id="myTable">
			
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
				  var firstname = $('#fname').val();
				  var lastname = $('#lname').val();
				  var genders = $('#gender').val();
				  var phones = $('#phone').val();
				  var insurance = $('#insurance').val();
				  var location = $('#location').val();
				  var email = $('#email').val();
				  
				  $.ajax({
					  url : "index.php",
					  type: "POST",
					  async: true,
					  data : {
						  update        : 1,
						  id            : id,
						  upfname       : firstname,
						  uplname       : lastname,
						  upgender      : genders,
						  upphones      : phones,
						  upinsurance   : insurance,
						  uplocation    : location,
						  upemail       : email
					  },
					  success:function(up){
						  alert("Success Update");
						  $('input[type=text]').val('');
						  showdata();
					  }
				  });
			  });
			  
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
						  $('#id').val(show.STUDENT_ID);
						  $('#fname').val(show.FIRSTNAME);
						  $('#lname').val(show.LASTNAME);
						  $('#gender').val(show.GENDER);
						  $('#phone').val(show.PHONE);
						  $('#insurance').val(show.INSURANCE_ID);
						  $('#location').val(show.LOCATION);
						  $('#email').val(show.EMAIL);
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
			
	 <footer class="mainFooter">
		    <p>Ashesi University College Health Center</p>
			<h1>Follow us on facebook!!!</h1>
	   </footer>
</body>	
</html>   
			
			