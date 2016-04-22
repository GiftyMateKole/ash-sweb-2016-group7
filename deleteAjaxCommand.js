<?php
	//check command
	if(!isset ($_REQUEST['cmd'])){}
	$cmd = $_REQUEST['cmd'];
	switch ($cmd){
		case 1:
			deletePatient();
			break;
		default:
			echo '{"message":"wrong command"}';
			break;
	}
	
		function deletePatient(){
			//check for usercode
			include("Info.php");
			if(!isset($_REQUEST['uc'])){
				echo '{"message":"usercode not provided"}';
				return;
			}
			$usercode = $_REQUEST['uc'];
			
			$obj = new Info();
			
			//delete user
			if($obj->deletePatient($usercode)){
				echo '{"result":0,"message":"patient deleted"}';
			}
			else{
				echo '{"result":1,"message":"patient not deleted"}';
			}
		}
		?>
