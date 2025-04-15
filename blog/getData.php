<?php
include 'admin/includes/config.php';

$results = $mysqli->query("SELECT * FROM `post`");

$data = array();

while ($row = $results->fetch_array()) {
 $data[] = array("title"=>$row['title'],"description"=>$row['description'],"image"=>$row['image']);
}
echo json_encode($data);
?>