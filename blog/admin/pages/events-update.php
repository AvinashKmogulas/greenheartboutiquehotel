<?php $id = $_GET["id"]; ?>  
<?php $cat_id = $catEvents; ?>  
<?php $subcat_id = $id; ?>  
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/f-events-update.php?id=<?php echo $id ?>', // the url where we want to POST
				data 		: formData, // our data object
				dataType 	: 'json', // what type of data do we expect back from the server
				processData : false,
			  	contentType : false,
  				encode		: true
			})
			// using the done promise callback
			.done(function(data) {
				// log data to the console so we can see
				console.log(data); 
				// here we will handle errors and validation messages
				//$(".btn-toolbar").notify("Please wait!", "info", { position:"left" });
				if ( ! data.success) {
					// handle errors for name ---------------
					if (data.errors.sTitle) {
						$("#elm_title").css('border-color','#f00');
						//$('#elm_career_name').addClass('has-error'); // add the error class to show red input
						//$('#elm_career_name').append('<div class="help-block">' + data.errors.sCareerTitle + '</div>'); // add the actual error message under our input
					}
					//$.notify(_.tr("text_changes_not_saved"), "error");
				} else {
					// ALL GOOD! just show the success message!
					//$(".btn-toolbar").notify("Notice Your changes have been saved.", "success", { position:"left" });
					//$('form').append('<div class="alert alert-success">' + data.message + '</div>');
					//alert(data.message);
					// usually after form submission, you'll want to redirect
					window.location = 'index.php?dispatch=events';
				}				
			})
			// using the fail promise callback
			.fail(function(data) {
				// show any errors
				// best to remove for production
				$.notify(_.tr("Oops, something went wrong. Please try again."), "error");
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
	  	<h1>Events</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Events</li>
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
						<h3 class="box-title">Update Form</h3>
					</div><!-- /.box-header -->
					
					<?php 
					$results = $mysqli->query("SELECT * FROM `Events` WHERE `ID` = ".$id);
					if ($results) { $obj = $results->fetch_object(); }
					?>
						
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_title">Title</label>
										<input type="text" class="form-control" name="form_data[Title]" id="elm_title" value="<?php echo $obj->Title ?>" />
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_description">Description</label>
										<textarea class="form-control" name="form_data[Description]" id="elm_description" rows="6"><?php echo $obj->Description ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_planningtools">Planning Tools</label>
										<textarea class="form-control" name="form_data[PlanningTools]" id="elm_planningtools" rows="6"><?php echo $obj->PlanningTools ?></textarea>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Picture</label>
										<div id="picsPanel"></div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="elm_status">Status</label>&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_active" value="Active" <?php if($obj->Status == "Active"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_disabled" value="Disabled" <?php if($obj->Status == "Disabled"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;Disabled
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group">
                    						<span class="input-group-addon">Sorting Order</span>
											<input type="text" class="form-control" name="form_data[SortOrder]" id="elm_sortorder" value="<?php echo $obj->SortOrder ?>" />
                  						</div>
                  					</div>
								</div>
							</div>

						</div><!-- /.box-body -->
						
						<div class="box-footer">
							<input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-primary" value="Update" />
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
    	CKEDITOR.replace('elm_description');
    	CKEDITOR.replace('elm_planningtools');
  })
</script>
