<?php
	require('../includes/config.php');
	
	$id = $_GET["id"];

	$errors = array();  	// array to hold validation errors
	$data   = array(); 		// array to pass back data

	if (empty($_POST['form_data']['Title'])) { $errors['sTitle'] = 'Title is required.'; }
	
	// Pic
	$oldfile1 = $_POST['form_data']['Pic1'];
	if (empty($_FILES["fileUpload1"]["name"])) { 
		if($oldfile1 == "") { 
			$ufile1_path = ""; 
		} else { 
			$ufile1_path = $oldfile1; 
		} 
	} else { 	
		$fname = $_FILES["fileUpload1"]["name"];
		$ext = end((explode(".", $fname)));
		$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.' .$ext;
		$ufile1_path = $new_image_name; 
		//$ufile1_path = $_FILES["fileUpload1"]["name"]; 
	}

	// if there are any errors in our errors array, return a success boolean of false
	if (! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
		$query = 	"UPDATE `Gallery` 
					SET `Title` = '" . $mysqli->real_escape_string($_POST['form_data']['Title']) . "',
						`Pic` = '" . $mysqli->real_escape_string($ufile1_path) . "',
						`FilterStay` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterStay']) . "',
						`FilterDine` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterDine']) . "',
						`FilterWeddings` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterWeddings']) . "',
						`FilterEvents` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterEvents']) . "',	
						`FilterExperience` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterExperience']) . "',
						`FilterOthers` = '" . $mysqli->real_escape_string($_POST['form_data']['FilterOthers']) . "',	
						`SortOrder` = '" . $_POST['form_data']['SortOrder'] . "',
						`Status` = '" . $mysqli->real_escape_string($_POST['form_data']['Status']) . "'
					WHERE ID=".$id;
				
		if ($mysqli->query($query)) {
			if (!empty($_FILES["fileUpload1"]["name"])) { move_uploaded_file($_FILES["fileUpload1"]["tmp_name"], "../../assets/img/gallery/".$ufile1_path); }
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
