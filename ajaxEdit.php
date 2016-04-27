<?php
 /**
*php code to edit patient records
*/
 include 'db.php';
if(isset($_GET['edit'])){
	$column = $_GET['column'];
	$id = $_GET['id'];
	$newValue = $_GET['newValue'];
	
	$sql = "UPDATE patient SET
	        $column = :value WHERE STUDENT_ID = :id";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':value',$newValue);
	$stmt->bindParam(':id',$id);
	$response['success'] = $stmt->execute();
	$response['value'] = $newValue;
	
	echo json_encode($response);
			
}
?>