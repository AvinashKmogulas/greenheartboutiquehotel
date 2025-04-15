<?php
	require('../includes/config.php');
	
	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data
	// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
	if (empty($_POST['form_data']['title'])) { $errors['sTitle'] = 'Title is required.'; }

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
		$url_slug = str_replace(" ","-",strtolower(trim($_POST['form_data']['title'])));
		// if there are no errors process our form, then return a message
		$query = 	"INSERT INTO `post` ( `title`, `description`, `tags`,`meta_title`,`meta_keywords`,`meta_description`,`urlslug`,`post_date`, `image`,`category_id`, `SortOrder`, `Status`) 
					VALUES 
					(
						'" . $mysqli->real_escape_string(strtolower(trim($_POST['form_data']['title']))) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['description']) . "',
						'" . $mysqli->real_escape_string(strtolower(trim($_POST['tagInput']))) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['meta_title']) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['meta_keywords']) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['meta_description']) . "',
						'" . $mysqli->real_escape_string($url_slug) . "',
						'" . $mysqli->real_escape_string(strtolower(trim($_POST['form_data']['post_date']))) . "',
						'" . $mysqli->real_escape_string($ufile1_path) . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['category_id']) . "',
						'" . $_POST['form_data']['SortOrder'] . "',
						'" . $mysqli->real_escape_string($_POST['form_data']['Status']) . "'
					)";
					
		$data['errors']  = $query;
		
		if ($mysqli->query($query)) {
			// Get Newly added ID
			$data['returnid'] = $mysqli->insert_id;
			if (!empty($_FILES["fileUpload1"]["name"]))	move_uploaded_file($_FILES["fileUpload1"]["tmp_name"], "../assets/img/post/".$ufile1_path);
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
