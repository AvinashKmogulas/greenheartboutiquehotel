<?php
	require('../includes/config.php');
	
	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data

	if (empty($_POST['form_data']['Description'])) { $errors['sDescription'] = 'Description is required.'; }

	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"UPDATE `Termsnconditions` 
					SET `Description` = '" . $mysqli->real_escape_string($_POST['form_data']['Description']) . "'
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
