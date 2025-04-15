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
				url 		: './pages/f-emails-update.php', // the url where we want to POST
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
					window.location = 'index.php?dispatch=emails&st=up';
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
	  	<h1>Emails</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Emails</li>
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
					$results = $mysqli->query("SELECT * FROM `QueryEmails` WHERE `ID` = 1");
					if ($results) { $obj = $results->fetch_object(); }
					?>
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="form-group">
								<label for="elm_homepopup">Home (Auto Popup Form)</label>
								<input type="text" class="form-control" name="form_data[HomePopup]" id="elm_homepopup" value="<?php echo $obj->HomePopup ?>" />
							</div>

							<div class="form-group">
								<label for="elm_staypopup">Stay (Auto Popup Form)</label>
								<input type="text" class="form-control" name="form_data[StayPopup]" id="elm_staypopup" value="<?php echo $obj->StayPopup ?>" />
							</div>

							<div class="form-group">
								<label for="elm_dinepopup">Dine (Auto Popup Form)</label>
								<input type="text" class="form-control" name="form_data[DinePopup]" id="elm_dinepopup" value="<?php echo $obj->DinePopup ?>" />
							</div>
						
							<div class="form-group">
								<label for="elm_weddingspopup">Weddings (Auto Popup Form)</label>
								<input type="text" class="form-control" name="form_data[WeddingsPopup]" id="elm_weddingspopup" value="<?php echo $obj->WeddingsPopup ?>" />
							</div>
						
							<div class="form-group">
								<label for="elm_eventspopup">Events (Auto Popup Form)</label>
								<input type="text" class="form-control" name="form_data[EventsPopup]" id="elm_eventspopup" value="<?php echo $obj->EventsPopup ?>" />
							</div>
						
							<div class="form-group">
								<label for="elm_bookyourtable">Book Your Table</label>
								<input type="text" class="form-control" name="form_data[BookYourTable]" id="elm_bookyourtable" value="<?php echo $obj->BookYourTable ?>" />
							</div>

							<div class="form-group">
								<label for="elm_planyourwedding">Plan Your Wedding</label>
								<input type="text" class="form-control" name="form_data[PlanYourWedding]" id="elm_planyourwedding" value="<?php echo $obj->PlanYourWedding ?>" />
							</div>

							<div class="form-group">
								<label for="elm_planyourevent">Plan Your Event</label>
								<input type="text" class="form-control" name="form_data[PlanYourEvent]" id="elm_planyourevent" value="<?php echo $obj->PlanYourEvent ?>" />
							</div>

							<div class="form-group">
								<label for="elm_career">Career</label>
								<input type="text" class="form-control" name="form_data[Career]" id="elm_career" value="<?php echo $obj->Career ?>" />
							</div>
							
							<div class="form-group">
								<label for="elm_newsletter">Newsletter</label>
								<input type="text" class="form-control" name="form_data[Newsletter]" id="elm_newsletter" value="<?php echo $obj->Newsletter ?>" />
							</div>

							<div class="form-group">
								<label for="elm_contact">Contact</label>
								<input type="text" class="form-control" name="form_data[Contact]" id="elm_contact" value="<?php echo $obj->Contact ?>" />
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

