<?php 
	$id = $_GET["id"];	
    $query = "DELETE from `Stay` where `ID`=" . $id;
    if ($mysqli->query($query)){
        $msg = "Record was deleted successfully!";
    }
    else {
        die ($mysqli->error);
    }
?>
<script type="text/javascript">
	window.location = 'index.php?dispatch=stay'; // redirect a user to another page
</script>