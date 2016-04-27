<?php
	/**
	*check and execute command pertaining to its case
	*/
	if(!isset ($_REQUEST['cmd'])){}
	$cmd = $_REQUEST['cmd'];
	switch ($cmd){
		case 1:
			deletePatient();
			break;
		case 2;
			deleteNurse();
			break;
		default:
			echo '{"message":"wrong command"}';
			break;
	}
		/**
		*check for usercode
		*return error if usercode is not provided
		* delete user & return message or error message
		*/
		function deletePatient(){
			include("Info.php");
			if(!isset($_REQUEST['uc'])){
				echo '{"message":"usercode not provided"}';
				return;
			}
			$usercode = $_REQUEST['uc'];
			
			$obj = new Info();
			
			if($obj->deletePatient($usercode)){
				echo '{"result":0,"message":"patient deleted"}';
			}
			else{
				echo '{"result":1,"message":"patient not deleted"}';
			}
		}
		
		/**
		*check for nursecode
		*return error if nursecode is not provided
		* delete nurse & return message or error message
		*/
		function deleteNurse(){
			
			include("Info.php");
			if(!isset($_REQUEST['un'])){
				echo '{"message":"nursecode not provided"}';
				return;
			}
			
			$nursecode = $_REQUEST['un'];
			
			$Newobj = new Info();
			
			if($Newobj->deleteNurse($nursecode)){
				echo '{"result":0,"message":"nurse deleted"}';
			}
			else{
				echo '{"result":1,"message":"nurse not deleted"}';
			}
		}
		?>
