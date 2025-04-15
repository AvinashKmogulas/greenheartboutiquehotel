<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type='text/javascript'>//<![CDATA[
$(document).on("click", ".trash", function () {
	var id=$(this).data('id');
	$('#modalDelete').attr('href','?dispatch=banners.delete&id='+id);
});//]]> 
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>Banners</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="#">Banners</a></li>
		</ol>
	</section>
	
	<style>
	.bannerBlock { border-bottom:solid 1px #ccc; margin-bottom:10px; padding-bottom:10px; }
	.bannerOptions { color:#fff; text-align:center; padding:5px; }
	.bannerOptions .fa { color:#fff; }
	</style>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				<div class="box box-primary">
				
					<div class="box-header">
						<h3 class="box-title"><a href="?dispatch=banners.add" class="btn btn-block btn-primary">Add New</a></h3>
					</div>
					
					<div class="box-body table-rowdata">
					
						<ul class="timeline timeline-inverse">
							<?php 
						/* 	$resultsGB = $mysqli->query("SELECT * FROM `Banners` WHERE `BannerType`='Home'");
							if ($resultsGB) { 
								$xColor = 0;
								while($objGB = $resultsGB->fetch_object()) { */
							?>
									<li><i class="fa fa-camera bg-<?php echo $bgColors[$xColor] ?>"></i>
										<div class="timeline-item">
											<?php if($resultsB = $mysqli->query("SELECT * FROM `Banners` WHERE `BannerType`='Home'")) { $totalBanners = $resultsB->num_rows; } ?>
											<span class="time"><i class="fa fa-th-large"></i> <?php echo $totalBanners ?> Banners</span>
											<h3 class="timeline-header"><?php //echo $objGB->BannerType ?>Home</h3>
											<div class="timeline-body">
												<?php
												$s_no = 1;
												$iColor = 0;
												$results = $mysqli->query("SELECT * FROM `Banners` WHERE `BannerType`='Home' ORDER BY `SortOrder`");
												if ($results) { 
													while($obj = $results->fetch_object()) {
														if(($iColor == 6)||($iColor == 9)||($iColor == 14)) { $iColor++; }
												?>        
														<div class="col-md-2 col-sm-3 col-xs-12">
															<div class="row info-box bg-<?php echo $bgColors[$iColor] ?>">
																<span class="col-md-12 info-box-thumb" style="margin:0; padding:0;">
																	<a href="?dispatch=banners.update&id=<?php echo $obj->ID ?>"><center><img class="img-responsive img-center" src="assets/img/banners/<?php echo $obj->Pic ?>" style="height:70px;" alt="" /></center></a>
																	<div class="bannerOptions">
																		<a href="?dispatch=banners.update&id=<?php echo $obj->ID ?>"><i class="fa fa-pencil-square-o fa-lg"></i></a>
																		&nbsp;&nbsp;
																		<a href="#confirm-modal" data-toggle="modal" class="trash" data-id="<?php echo $obj->ID ?>" data-target="#confirm-modal"><i class="fa fa-trash-o fa-lg"></i></a>
																	</div>
																</span>
															</div>
														</div>
												<?php
														$s_no++;
														$iColor++;
														if($iColor == 13) { $iColor=0; }
													}
												}
												?>
												<div class="clearfix"></div>
											</div>
										</div>
									</li>
							<?php
								/* 	$xColor++;
									if($xColor == 13) { $xColor=0; }
								}
							} */
							?>
							<li><i class="fa fa-clock-o bg-gray"></i></li>
						</ul>					
					
					</div>
					
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="confirm-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<div class="modal-body">
				<p>You are about to delete one record, this procedure is irreversible.</p>
				<p>Do you want to proceed?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
				<a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		//Enable iCheck plugin for checkboxes
		//iCheck for checkbox and radio inputs
		$('.table-rowdata input[type="checkbox"]').iCheck({
			checkboxClass: 'icheckbox_flat-blue',
			radioClass: 'iradio_flat-blue'
		});
		
		//Enable check and uncheck all functionality
		$(".checkbox-toggle").click(function () {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$(".table-rowdata input[type='checkbox']").iCheck("uncheck");
				$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
			} else {
				//Check all checkboxes
				$(".table-rowdata input[type='checkbox']").iCheck("check");
				$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
			}
			$(this).data("clicks", !clicks);
		});
		
		//Handle starring for glyphicon and font awesome
		$(".mailbox-star").click(function (e) {
		e.preventDefault();
		//detect type
		var $this = $(this).find("a > i");
		var glyph = $this.hasClass("glyphicon");
		var fa = $this.hasClass("fa");
		
		//Switch states
		if (glyph) {
			$this.toggleClass("glyphicon-star");
			$this.toggleClass("glyphicon-star-empty");
		}
		
		if (fa) {
			$this.toggleClass("fa-star");
			$this.toggleClass("fa-star-o");
		}
	});
	});
</script>

<?php include "./pages/footer.php" ?>
