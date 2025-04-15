<?php 
include("../includes/config.php");
	$whr='';
	if(isset($_GET["id"])){
		$whr.="`id`=" . $_GET["id"];
	}if(isset($_GET["slug"])){
		$whr.="`urlslug`=" . $_GET["slug"];
	}
	$id = $_GET["id"];	
    $query = "DELETE from `post` where $whr";
    if ($mysqli->query($query)){
        $msg = "Record was deleted successfully!";
    }
    else {
        die ($mysqli->error);
    }
?>
<script type="text/javascript">
	window.location = 'index.php?dispatch=awards'; // redirect a user to another page
</script>