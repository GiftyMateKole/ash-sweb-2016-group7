	<?php
	$connect = mysql_connect("localhost","root","");
	if($connect){
		mysql_select_db("ashesiclinic",$connect);
	}
	if(isset($_POST['buttonsave'])){
		echo "see me";
		$sql="INSERT INTO insurance(INSURANCE_ID,INSURANCE_TYPE)
			  VALUES('{$_POST[insurance]}','{$_POST[insurancetype]}')";
			  $result = mysql_query($sql);
			  if($result)
			  {
				  echo "Successfully insert";
			  }
			  exit();
	}

	if(isset($_POST['editvalue'])){
		$sql = "SELECT * FROM insurance WHERE INSURANCE_ID='{$_POST['id']}'";
		$row = mysql_query($sql);
		$rows = mysql_fetch_object($row);
		
		header("Content-type:text/x-json");
		echo json_encode($rows);
		exit();
	}
	
	//code update
	if(isset($_POST['update'])){
		$sql = "UPDATE insurance
		      SET
				 INSURANCE_TYPE  = '{$_POST['upinsurancetype']}'
				 WHERE INSURANCE_ID    ='{$_POST['id']}'";
		$res = mysql_query($sql);
		if($res){
			echo "Successfully updated";
		}
	}
    //code delete 
	if(isset($_POST['deletes'])){
		$sql = mysql_query("DELETE FROM insurance WHERE INSURANCE_ID = '{$_POST['id']}'");
		if($sql){
			echo "Success";
		}
	}
	//end
	
	if(isset($_POST['showtable'])){
		$sql = "SELECT * FROM insurance";
		$result = mysql_query($sql);
		echo "<thead>
				  <th>Insurance_Id</th>
				  <th>Insurance Type</th>
				  <th>Action</th>
			 </thead>";
		while($row=mysql_fetch_object($result)){
			echo "<tr>
					  <td>$row->INSURANCE_ID</td>
					  <td>$row->INSURANCE_TYPE</td>
					  <td><a ide='$row->INSURANCE_ID' class='edit' href='#?ide=$row->INSURANCE_ID'>Edit</a>|
						  <a idd='$row->INSURANCE_ID' class='delete' href='#?idd=$row->INSURANCE_ID'>Delete</a></td>
				 </tr>";
		}
		exit();
		
	}
	?>
	
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<div id="testforajax"><br><br>
		<tr>
			<input type="hidden" value="" id="id" name="id" />
			<td>Insurance Type</td>
			<td>:</td>
			<td><input type="text" id="insurancetype" name="insurancetype" value="<?php echo $rows->INSURANCE_TYPE; ?>"></td>
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
				  var insurancetype = $('#insurancetype').val();
				  
				  $.ajax({
					  url : "index.php",
					  type: "POST",
					  async: false,
					  data : {
						  update        : 1,
						  id            : id,
						  upinsurancetype : insurancetype
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
						  $('#id').val(show.INSURANCE_ID);
						  $('#insurancetype').val(show.INSURANCE_TYPE);
					  }
					  
				  });
			  });
			  
			  $('#save').click(function(){
			  var  nameinsurancetype = $('#insurancetype').val();
			  $.ajax({
				  url  :"index.php",
				  type :"POST",
				  async:false,
				  data :{
						 buttonsave   : 1,
						 insurancetype  : nameinsurancetype
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
			
			
			
			