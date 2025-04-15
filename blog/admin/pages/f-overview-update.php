<?php
	require('../includes/config.php');
	
	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data

	if (empty($_POST['form_data']['Stay'])) { $errors['sStay'] = 'Stay is required.'; }

	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"UPDATE `Overview` 
					SET `Stay` = '" . $mysqli->real_escape_string($_POST['form_data']['Stay']) . "',
						`Dine` = '" . $mysqli->real_escape_string($_POST['form_data']['Dine']) . "',
						`Weddings` = '" . $mysqli->real_escape_string($_POST['form_data']['Weddings']) . "',
						`Events` = '" . $mysqli->real_escape_string($_POST['form_data']['Events']) . "',
						`Experience` = '" . $mysqli->real_escape_string($_POST['form_data']['Experience']) . "',
						`Gallery` = '" . $mysqli->real_escape_string($_POST['form_data']['Gallery']) . "',
						`SpecialOffers` = '" . $mysqli->real_escape_string($_POST['form_data']['SpecialOffers']) . "',
						`ThingsToDo` = '" . $mysqli->real_escape_string($_POST['form_data']['ThingsToDo']) . "',
						`Agra` = '" . $mysqli->real_escape_string($_POST['form_data']['Agra']) . "',
						`Media` = '" . $mysqli->real_escape_string($_POST['form_data']['Media']) . "',
						`About` = '" . $mysqli->real_escape_string($_POST['form_data']['About']) . "',
						`Career` = '" . $mysqli->real_escape_string($_POST['form_data']['Career']) . "',
						`Reviews` = '" . $mysqli->real_escape_string($_POST['form_data']['Reviews']) . "',
						`Privacy` = '" . $mysqli->real_escape_string($_POST['form_data']['Privacy']) . "',
						`Terms` = '" . $mysqli->real_escape_string($_POST['form_data']['Terms']) . "',
						`Contact` = '" . $mysqli->real_escape_string($_POST['form_data']['Contact']) . "'
					WHERE ID=1";
				
		if ($mysqli->query($query)) {
			$data['success'] = true;
			$data['message'] = 'Success!';
		}
		else {
			$data['success'] = false;
			$data['message'] = 'Fail!';
		}
		// show a message of success and provide a true success variable
		$mysqli->close();
		$data['returnid'] = $pid;		
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?>
