<?php 
	$id = $_GET["id"];	
    $query = "DELETE from `Gallery` where `ID`=" . $id;
    if ($mysqli->query($query)){
        $msg = "Picture was deleted successfully!";
    }
    else {
        die ($mysqli->error);
    }
?>
<script type="text/javascript">
	window.location = 'index.php?dispatch=gallery'; // redirect a user to another page
</script>