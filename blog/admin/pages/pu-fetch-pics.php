<?php 
require('../includes/config.php');
if($_GET['cid'] != 0) {
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$resultsPic = $mysqli->query("SELECT * FROM `Pictures` WHERE `CategoryID` = ".$cid." AND `SubCategoryID`=".$scid." ORDER BY `SortOrder` ASC");
	if ($resultsPic) { 
		while($objPic = $resultsPic->fetch_object()) {
	?>
			<div class="picThumbnail">
				<img src="../assets/img/pictures/<?php echo $objPic->Pic ?>" alt="<?php echo $objPic->Title ?>" />
				<div class="picThumbnailOverlay">
					<a href="#UploadPicModal" class="open-UploadPicModal btn-u btn-u-green" data-toggle="modal" data-cid="<?php echo $objPic->CategoryID ?>"  data-scid="<?php echo $objPic->SubCategoryID ?>"><i class="fa fa-pencil-square-o"></i></a>
					<a href="#DeletePicConfirmModal" data-toggle="modal" data-id="<?php echo $objPic->ID ?>" data-cid="<?php echo $objPic->CategoryID ?>" data-scid="<?php echo $objPic->SubCategoryID ?>" data-target="#DeletePicConfirmModal" class="open-DeletePicConfirmModal btn-u btn-u-red"><i class="fa fa-trash-o"></i></a>
				</div>
			</div>											
	<?php
		}
	}
}
?>
<div class="picThumbnail"><a href="#UploadPicModal" class="open-UploadPicModal" data-toggle="modal" data-cid="<?php echo $cid ?>"  data-scid="<?php echo $scid ?>"><img src="./dist/img/add-new-pic.png" alt="" /></a></div>

