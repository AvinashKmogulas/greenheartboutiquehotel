<?php
	require('../includes/config.php');
	
	$id = $_GET["id"];

	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data

	if (empty($_POST['form_data']['Title'])) { $errors['sTitle'] = 'Title is required.'; }

	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"UPDATE `Wellness` 
					SET `Title` = '" . $mysqli->real_escape_string($_POST['form_data']['Title']) . "',
						`Description` = '" . $mysqli->real_escape_string($_POST['form_data']['Description']) . "',
						`SortOrder` = '" . $_POST['form_data']['SortOrder'] . "',
						`Status` = '" . $mysqli->real_escape_string($_POST['form_data']['Status']) . "'
					WHERE ID=".$id;
				
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
		$data['returnid'] = $id;		
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?>
