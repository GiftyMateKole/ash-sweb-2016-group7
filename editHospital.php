	<?php
	$connect = mysql_connect("localhost","root","");
	if($connect){
		mysql_select_db("ashesiclinic",$connect);
	}
	if(isset($_POST['buttonsave'])){
		echo "see me";
		$sql="INSERT INTO hospital(NAME,ADDRESS,PHONE)
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
		$sql = "SELECT * FROM hospital WHERE HOSPITAL_ID='{$_POST['id']}'";
		$row = mysql_query($sql);
		$rows = mysql_fetch_object($row);
		
		header("Content-type:text/x-json");
		echo json_encode($rows);
		exit();
	}
	
	//code update
	if(isset($_POST['update'])){
		$sql = "UPDATE hospital
		      SET
			     NAME = '{$_POST['uphospitalname']}',
				 ADDRESS     = '{$_POST['upaddress']}',
				 PHONE       = '{$_POST['upphone']}'
				 WHERE HOSPITAL_ID    ='{$_POST['id']}'";
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
		$sql = "SELECT * FROM hospital";
		$result = mysql_query($sql);
		echo "<thead>
				  <th>Hospital_Id</th>
				  <th>Hospital Name</th>
				  <th>Address</th>
				  <th>Phone</th>
				  <th>Action</th>
			 </thead>";
		while($row=mysql_fetch_object($result)){
			echo "<tr>
					  <td>$row->HOSPITAL_ID</td>
					  <td>$row->NAME</td>
					  <td>$row->ADDRESS</td>
					  <td>$row->PHONE</td>
					  <td><a ide='$row->HOSPITAL_ID' class='edit' href='#?ide=$row->HOSPITAL_ID'>Edit</a>|
						  <a idd='$row->HOSPITAL_ID' class='delete' href='#?idd=$row->HOSPITAL_ID'>Delete</a></td>
				 </tr>";
		}
		exit();
		
	}
	?>
	
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<div id="testforajax">
		<tr>
			<input type="hidden" value="" id="id" name="id" />
			<td>Hospital Name</td>
			<td>:</td>
			<td><input type="text" id="hospitalname" name="hospitalname" value="<?php echo $rows->NAME; ?>"></td>
	
			<td>Address</td>
			<td>:</td>
			<td><input type="text" id="address" name="address" value="<?php echo $rows->ADDRESS; ?>"></td>
		
			<td>Phone</td>
			<td>:</td>
			<td><input type="text" id="phone" name="phone" value="<?php echo $rows->PHONE; ?>"></td>
		</tr>
		<input type="button" value="Save" id="save">
		<input type="button" value="Update" id="update">
	</div>
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
				  var hospitalnames = $('#hospitalname').val();
				  var address = $('#address').val();
				  var phones = $('#phone').val();
				  
				  $.ajax({
					  url : "index.php",
					  type: "POST",
					  async: false,
					  data : {
						  update        : 1,
						  id            : id,
						  uphospitalname : hospitalnames,
						  upaddress      : address,
						  upphone       : phones
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
						  $('#id').val(show.HOSPITAL_ID);
						  $('#hospitalname').val(show.NAME);
						  $('#address').val(show.ADDRESS);
						  $('#phone').val(show.PHONE);
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
			
			
			
			