<?php
	require('../includes/config.php');
	session_start();

	if($_POST){
		//check if its an ajax request, exit if not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			//exit script outputting json data
			$output = json_encode(
			array(
				'type'=>'error', 
				'text' => 'Request must come from Ajax'
			));
			die($output);
		} 
		
		//check $_POST vars are set, exit if any missing
		if(!isset($_POST["userEmail"]) || !isset($_POST["userPassword"])){
			$output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
			die($output);
		}
	
		//Sanitize input data using PHP filter_var().
		$user_Email = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
		$user_Password = filter_var($_POST["userPassword"], FILTER_SANITIZE_STRING);
		$user_Password = md5($user_Password);
		
		//additional php validation
		if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
			//email validation
			$output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
			die($output);
		}
		
		
		$results = $mysqli->query("SELECT * FROM `Users` WHERE `Email`= '".$user_Email."' AND `Password`='".$user_Password."'");
		if ($results->num_rows!=0) { 
			$obj = $results->fetch_object();
			$_SESSION['userName'] = $obj->Name;
			$_SESSION['userEmail'] = $obj->Email;
			$_SESSION['userID'] = $obj->ID;
			$_SESSION['userPic'] = $obj->Pic;
			$_SESSION['userDate'] = $obj->CreationDate;
			$_SESSION['userType'] = $obj->UserType;
			$ip = get_client_ip();
			
			$query = "INSERT INTO `Logs` ( `UserID`, `IP`) 
						VALUES 
						(
							'" . $obj->ID . "',
							'" . $ip . "'
						)";
			$mysqli->query($query);			
			
			$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$_SESSION['userName'].' Redirecting...'));
			die($output);
		}
		else {
			$output = json_encode(array('type'=>'error', 'text' => 'Invalid username/password.'));
			die($output);
		}
		
	}
?>