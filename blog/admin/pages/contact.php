<?php $st = $_GET["st"]; ?>      
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {
		$('form').submit(function(event) {
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/f-contact-update.php', // the url where we want to POST
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
				if ( ! data.success) {
					// handle errors for name ---------------
					if (data.errors.sAddress) {
						$("#elm_address").css('border-color','#f00');
						//$('#elm_name').addClass('has-error'); // add the error class to show red input
						//$('#elm_name').append('<div class="help-block">' + data.errors.sTitle + '</div>'); // add the actual error message under our input
					}
				} else {
					window.location = 'index.php?dispatch=contact&st=up';
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
	  	<h1>Contact</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Contact</li>
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
					
					<?php if($st=="up"){?>		
					<div id="alertBox" class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    	<i class="icon fa fa-check"></i> Content updated.
                  	</div>							
					<?php } ?>	
								
					<?php 
					$results = $mysqli->query("SELECT * FROM `Contact` WHERE `ID`=1");
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
										<label for="elm_address">Address</label>
										<textarea class="form-control" name="form_data[Address]" id="elm_address" rows="6"><?php echo $obj->Address ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_mapcode">Map Code</label>
										<textarea class="form-control" name="form_data[MapCode]" id="elm_mapcode" rows="4"><?php echo $obj->MapCode ?></textarea>
									</div>
								</div>
							</div>
						
              				<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_email1">Email 1</label>
										<input type="text" class="form-control" name="form_data[Email1]" id="elm_email1" value="<?php echo $obj->Email1 ?>" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_email2">Email 2</label>
										<input type="text" class="form-control" name="form_data[Email2]" id="elm_email2" value="<?php echo $obj->Email2 ?>" />
									</div>
								</div>
							</div>

              				<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_phone1">Phone 1</label>
										<input type="text" class="form-control" name="form_data[Phone1]" id="elm_phone1" value="<?php echo $obj->Phone1 ?>" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_phone2">Phone 2</label>
										<input type="text" class="form-control" name="form_data[Phone2]" id="elm_phone2" value="<?php echo $obj->Phone2 ?>" />
									</div>
								</div>
							</div>
							
              				<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_mobile1">Mobile 1</label>
										<input type="text" class="form-control" name="form_data[Mobile1]" id="elm_mobile1" value="<?php echo $obj->Mobile1 ?>" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_mobile2">Mobile 2</label>
										<input type="text" class="form-control" name="form_data[Mobile2]" id="elm_mobile2" value="<?php echo $obj->Mobile2 ?>" />
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

<script>
  $(function () {
    	CKEDITOR.replace('elm_address');
  })
</script>
