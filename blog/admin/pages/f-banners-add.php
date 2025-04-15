<?php
	require('../includes/config.php');
	
	
	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data
	// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
	if (empty($_POST['form_data']['BannerType'])) { $errors['sBannerType'] = 'Banner Type is required.'; }

	// Pic
	if (empty($_FILES["fileUpload1"]["name"])) {	
		$ufile1_path = ""; 
	} else {
		$fname = $_FILES["fileUpload1"]["name"];
		$ext = end((explode(".", $fname)));
		$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' .$ext;
		$ufile1_path = $new_image_name; 
		// $ufile1_path = $_FILES["fileUpload1"]["name"]; 
	}
	
	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"INSERT INTO `Banners` ( `Title`,`Pic`, `BannerType`, `SortOrder`, `Status`) VALUES ('" . $mysqli->real_escape_string($_POST['form_data']['Title1']) . "','" . $mysqli->real_escape_string($ufile1_path) . "','" . $mysqli->real_escape_string($_POST['form_data']['BannerType']) . "','" . $_POST['form_data']['SortOrder'] . "','" . $mysqli->real_escape_string($_POST['form_data']['Status']) . "')";
					
		$data['errors']  = $query;
		
		if ($mysqli->query($query)) {
			// Get Newly added ID
			$data['returnid'] = $mysqli->insert_id;
			if (!empty($_FILES["fileUpload1"]["name"]))	move_uploaded_file($_FILES["fileUpload1"]["tmp_name"], "../assets/img/banners/".$ufile1_path);
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
