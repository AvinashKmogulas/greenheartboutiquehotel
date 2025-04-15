<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
	$("#table1").on("click", ".trash", function() {
		var id=$(this).data('id');
		$('#modalDelete').attr('href','?dispatch=comment.delete&id='+id);
	})
});//]]> 
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>Comment</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="#">Comment</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				<div class="box box-primary">
					<!--<div class="box-header">
						<h3 class="box-title"><a href="?dispatch=co.add" class="btn btn-block btn-primary">Add New</a></h3>
					</div>-->
					
					<div class="box-body table-rowdata">
					
						<table id="table1" class="table table-bordered table-striped table-hover">
						<thead>
							<tr><th style="width:10px" class="no-sort">
									<!-- Check all button -->
									<button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
									<!--button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button-->
								</th>
								<th style="width:10px">#</th>
								<th>Name</th>
								<th style="width:60px">Email</th>
								<th style="width:60px">Comment</th>
								<th style="width:60px">Status</th></tr>
						</thead>
						<tbody>
							<?php
							$s_no = 1;
							$results = $mysqli->query("SELECT * FROM `comments`");
							if ($results) { 
								while($obj = $results->fetch_object()) {
							?>                        
									<tr><td><input type="checkbox">&nbsp;&nbsp;<a href="#confirm-modal" data-toggle="modal" class="trash" data-id="<?php echo $obj->id ?>" data-target="#confirm-modal"><i class="fa fa-trash-o"></i></a></td>
										<td><?php echo $s_no ?></td>
										<td><a href="?dispatch=comment.update&id=<?php echo $obj->id ?>"><?php echo ucwords($obj->name) ?></a></td>
										<td><?php echo $obj->email ?></td>
										<td><?php echo $obj->comment ?></td>
										<td><span class="label label-<?php if($obj->status=="Active"){ ?>success<?php }else{ ?>danger<?php } ?> uc ls-1"><?php echo $obj->status ?></span></td></tr>
							<?php
									$s_no++;
								}
							}
							?>
						</tbody>
						</table>
					</div><!-- /.box-body -->
					
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
	
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
