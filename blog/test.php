<?php
header("Content-type: application/json");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: *.ampproject.org");
header("AMP-Access-Control-Allow-Source-Origin: https://mogulsqueries.com");
header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
include 'admin/includes/config.php';
date_default_timezone_set("Asia/Calcutta"); 
$today = date("Y-m-d H:i:s");
$query = 	"INSERT INTO `comments` ( `name`, `email`, `comment`, `post_id`, `status`, `post_date`) VALUES (
'" . $mysqli->real_escape_string($_POST['name']) . "','" . $mysqli->real_escape_string($_POST['email']) . "','" . $mysqli->real_escape_string($_POST['comment']) . "','" . $_POST['post_id'] . "','Disabled','" . $mysqli->real_escape_string($today) . "')";
$mysqli->query($query);
echo json_encode($_POST);

die;
?>