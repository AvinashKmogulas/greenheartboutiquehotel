<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
	$('.trash').click(function(){
		var id=$(this).data('id');
		$('#modalDelete').attr('href','?dispatch=gallery.delete&id='+id);
	})
});//]]> 
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>Gallery</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="#">Gallery</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				<div class="box box-primary">
				
					<div class="box-header">
						<h3 class="box-title"><a href="?dispatch=gallery.add" class="btn btn-block btn-primary">Add New</a></h3>
					</div>
					
					<div class="box-body table-rowdata">
						<style>
						.gal-box-thumb {}
						.gal-box-content { padding:10px; }
						.gal-box-text { }
						.gal-box-text a { font-size:16px; color:#fff; text-transform:none; }
						.gal-box-text a:hover { color:#000; }
						.gal-box-number { text-align:right; text-transform:uppercase; font-size:10px; letter-spacing:2px; margin-top:10px; }
						.pd-left { float:left; display:inline; color:#fff; font-weight:bold; }
						.pd-right { float:right; display:inline; }
						.pd-right a { color:#fff; font-weight:bold; }
						.pd-right a:hover { color:#000; font-weight:bold; }
						</style>
					
						<div class="row" style="padding:0px;">
							<?php
							$s_no = 1;
							$iColor = 0;
							$results = $mysqli->query("SELECT * FROM `Gallery` ORDER BY `SortOrder` ASC");
							if ($results) { 
								while($obj = $results->fetch_object()) {
									if(($iColor == 6)||($iColor == 9)||($iColor == 14)) { $iColor++; }
							?>        
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="row gal-box bg-<?php echo $bgColors[$iColor] ?>" style="margin:4px;">
											<div class="col-md-4"><div class="gal-box-thumb"><a href="?dispatch=photogallery.update&pid=<?php echo $pid ?>&id=<?php echo $obj->ID ?>"><img class="img-responsive" src="../assets/img/gallery/<?php echo $obj->Pic ?>" style="height:99px;" alt="" /></a></div></div>
											<div class="col-md-8">
												<div class="gal-box-content">
													<div class="row">
														<div class="col-md-9"><div class="gal-box-text"><a href="?dispatch=gallery.update&pid=<?php echo $pid ?>&id=<?php echo $obj->ID ?>"><?php echo $obj->Title ?></a></div></div>
														<div class="col-md-3"><div class="gal-box-number"><?php echo $obj->Status ?></div></div>
													</div>
													<div class="clearfix" style="height:5px;"></div>
													<div class="progress progress-xxs">
														<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo rand(10,100); ?>%">
															<span class="sr-only">60% Complete (warning)</span>
														</div>
													</div>													
													<span class="progress-description pd-left"><?php echo $obj->SortOrder ?></span>
													<span class="progress-description pd-right"><a href="#confirm-modal" data-toggle="modal" class="trash" data-pid="<?php echo $obj->PropertyID ?>" data-id="<?php echo $obj->ID ?>" data-target="#confirm-modal"><i class="fa fa-trash-o fa-lg"></i></a></span>
												</div>
											</div>
										</div>
									</div>			
							<?php
									$s_no++;
									$iColor++;
									if($iColor == 13) { $iColor=0; }
								}
							}
							?>
						</div>

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
