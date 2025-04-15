<?php 
	$id = $_GET["id"];	
    $query = "DELETE from `ThingsToDo` where `ID`=" . $id;
    if ($mysqli->query($query)){
        $msg = "Record was deleted successfully!";
    }
    else {
        die ($mysqli->error);
    }
?>
<script type="text/javascript">
	window.location = 'index.php?dispatch=thingstodo'; // redirect a user to another page
</script>