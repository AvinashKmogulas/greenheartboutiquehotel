<?php
	require('../includes/config.php');
	
	
	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data
	// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
	if (empty($_POST['form_data']['Title'])) { $errors['sTitle'] = 'Title is required.'; }

	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"INSERT INTO `Concierge` ( `Title`, `SubTitle`, `Description`, `SortOrder`, `Status`) 
					VALUES  
					(
						'" . $mysqli->real_escape_string($_POST['form_data']['Title']) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['SubTitle']) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['Description']) . "',
						'" . $_POST['form_data']['SortOrder'] . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['Status']) . "'
					)";
					
		$data['errors']  = $query;
		
		if ($mysqli->query($query)) {
			// Get Newly added ID
			$data['returnid'] = $mysqli->insert_id;
			$data['success'] = true;
			$data['message'] = 'Success!';
		}
		else {
			$data['success'] = false;
			$data['message'] = 'Fail!';
		}
		// show a message of success and provide a true success variable
		$mysqli->close();
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?>
