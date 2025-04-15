<?php $cat_id = $catWellness; ?>  
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {

		$('form').submit(function(event) {
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			$.ajax({
				type 		: 'POST',
				url 		: './pages/f-wellness-add.php',
				data 		: formData, 
				dataType 	: 'json', 
				processData : false,
			  	contentType : false,
  				encode		: true
			})
			.done(function(data) {
				console.log(data); 
				//$(".btn-toolbar").notify("Please wait!", "info", { position:"left" });
				if (! data.success) {
					if (data.errors.sTitle) {
						$("#elm_title").css('border-color','#f00');
						//$('#elm_category_name').addClass('has-error'); // add the error class to show red input
						//$('#elm_category_name').append('<div class="help-block">' + data.errors.sCategoryTitle + '</div>'); // add the actual error message under our input
					}
					//$.notify(_.tr("text_changes_not_saved"), "error");
				} else {
					// ALL GOOD! just show the success message!
					//$(".btn-toolbar").notify("Notice Your changes have been saved.", "success", { position:"left" });
					//$('form').append('<div class="alert alert-success">' + data.message + '</div>');
					//alert(data.message);
					window.location = '?dispatch=wellness';
				}				
			})
			.fail(function(data) {
				// show any errors
				// best to remove for production
				console.log(data);
			});	
			// stop the form from submitting the normal way and refreshing the page
			event.preventDefault();
		});

	});
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>Wellness</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Wellness</li>
	  	</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Add Form</h3>
					</div><!-- /.box-header -->
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_title">Title</label>
										<input type="text" class="form-control" name="form_data[Title]" id="elm_title" value="" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="elm_description">Description</label>
								<textarea class="form-control" name="form_data[Description]" id="elm_description" rows="6"></textarea>
							</div>

							<div class="row">
								<div class="col-md-6" style="margin-bottom:20px;">
									<ul class="timeline">
										<li class="time-label"><span class="bg-red">&nbsp;&nbsp;Add Pictures&nbsp;&nbsp;</span></li>
										<li><i class="fa fa-floppy-o bg-green"></i>
											<div class="timeline-item"><h3 class="timeline-header no-border">First add/save this object</h3></div>
										</li>
										
										<li><i class="fa fa-pencil-square-o bg-aqua"></i>
											<div class="timeline-item"><h3 class="timeline-header no-border">and then edit/update/modify the same object.</h3></div>
										</li>
										
										<li><i class="fa fa-picture-o bg-gray"></i></li>
									</ul>												
								</div>	
							</div>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="elm_status">Status</label>&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_active" value="Active" checked="checked" />&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_disabled" value="Disabled" />&nbsp;&nbsp;Disabled
									</div>
								</div>
								
								<?php if($resultsSO = $mysqli->query("SELECT * FROM `Wellness`")) { $SortOrderNumber = $resultsSO->num_rows+1; } ?>
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group">
                    						<span class="input-group-addon">Sorting Order</span>
											<input type="text" class="form-control" name="form_data[SortOrder]" id="elm_sortorder" value="<?php echo $SortOrderNumber; ?>" />
                  						</div>
                  					</div>
								</div>
							</div>
							
						</div><!-- /.box-body -->
						
						<div class="box-footer">
							<input type="submit" name="btnAdd" id="btnAdd" class="btn btn-primary" value="Add" />
						</div>
					</form>
				</div><!-- /.box -->

  			</div>   <!-- /.row -->
		</div>   <!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include "./pages/footer.php" ?>

<?php include "./pages/pu-upload-pic-modal.php" ?>

<script>
  $(function () {
    	CKEDITOR.replace('elm_description')
  })
</script>

