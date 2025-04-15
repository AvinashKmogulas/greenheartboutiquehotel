<?php $st = $_GET["st"]; ?>      
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {
		$('form').submit(function(event) {
			var formData = new FormData(document.getElementById("update_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/f-socialmedia-update.php', // the url where we want to POST
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
						$("#elm_facebook").css('border-color','#f00');
						//$('#elm_name').addClass('has-error'); // add the error class to show red input
						//$('#elm_name').append('<div class="help-block">' + data.errors.sTitle + '</div>'); // add the actual error message under our input
					}
				} else {
					window.location = 'index.php?dispatch=socialmedia&st=up';
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
	  	<h1>Social Media</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Social Media</li>
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
					$results = $mysqli->query("SELECT * FROM `SocialMedia` WHERE `ID` = 1");
					if ($results) { $obj = $results->fetch_object(); }
					?>
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="form-group">
								<label for="elm_facebook">Facebook</label>
								<input type="text" class="form-control" name="form_data[Facebook]" id="elm_facebook" value="<?php echo $obj->Facebook ?>" />
							</div>

							<div class="form-group">
								<label for="elm_instagram">Instagram</label>
								<input type="text" class="form-control" name="form_data[Instagram]" id="elm_instagram" value="<?php echo $obj->Instagram ?>" />
							</div>

							<div class="form-group">
								<label for="elm_youtube">Youtube</label>
								<input type="text" class="form-control" name="form_data[Youtube]" id="elm_youtube" value="<?php echo $obj->Youtube ?>" />
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

