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
				url 		: './pages/f-overview-update.php', // the url where we want to POST
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
					window.location = 'index.php?dispatch=overview&st=up';
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
	  	<h1>Overview</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Overview</li>
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
					$results = $mysqli->query("SELECT * FROM `Overview` WHERE `ID`=1");
					if ($results) { $obj = $results->fetch_object(); }
					?>
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_stay">Stay</label>
										<textarea class="form-control" name="form_data[Stay]" id="elm_stay" rows="4"><?php echo $obj->Stay ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_dine">Dine</label>
										<textarea class="form-control" name="form_data[Dine]" id="elm_dine" rows="4"><?php echo $obj->Dine ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_weddings">Weddings</label>
										<textarea class="form-control" name="form_data[Weddings]" id="elm_weddings" rows="4"><?php echo $obj->Weddings ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_events">Events</label>
										<textarea class="form-control" name="form_data[Events]" id="elm_events" rows="4"><?php echo $obj->Events ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_experience">Experience</label>
										<textarea class="form-control" name="form_data[Experience]" id="elm_experience" rows="4"><?php echo $obj->Experience ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_gallery">Gallery</label>
										<textarea class="form-control" name="form_data[Gallery]" id="elm_gallery" rows="4"><?php echo $obj->Gallery ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_specialoffers">Special Offers</label>
										<textarea class="form-control" name="form_data[SpecialOffers]" id="elm_specialoffers" rows="4"><?php echo $obj->SpecialOffers ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_thingstodo">Things To Do</label>
										<textarea class="form-control" name="form_data[ThingsToDo]" id="elm_thingstodo" rows="4"><?php echo $obj->ThingsToDo ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_agra">Agra</label>
										<textarea class="form-control" name="form_data[Agra]" id="elm_agra" rows="4"><?php echo $obj->Agra ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_media">Media</label>
										<textarea class="form-control" name="form_data[Media]" id="elm_media" rows="4"><?php echo $obj->Media ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_about">About</label>
										<textarea class="form-control" name="form_data[About]" id="elm_about" rows="4"><?php echo $obj->About ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_career">Career</label>
										<textarea class="form-control" name="form_data[Career]" id="elm_career" rows="4"><?php echo $obj->Career ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_reviews">Reviews</label>
										<textarea class="form-control" name="form_data[Reviews]" id="elm_reviews" rows="4"><?php echo $obj->Reviews ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_privacy">Privacy</label>
										<textarea class="form-control" name="form_data[Privacy]" id="elm_privacy" rows="4"><?php echo $obj->Privacy ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_terms">Terms</label>
										<textarea class="form-control" name="form_data[Terms]" id="elm_terms" rows="4"><?php echo $obj->Terms ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_contact">Contact</label>
										<textarea class="form-control" name="form_data[Contact]" id="elm_contact" rows="4"><?php echo $obj->Contact ?></textarea>
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

<script type='text/javascript'>//<![CDATA[
	$(window).load(function(){
		$("#fileUpload1").on('change', function () {
			 //Get count of selected files
			 var countFiles = $(this)[0].files.length;
			 var imgPath = $(this)[0].value;
			 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			 var image_holder = $("#image-holder1");
			 image_holder.empty();
			 if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
				 if (typeof (FileReader) != "undefined") {
					 //loop for each file selected for uploaded.
					 for (var i = 0; i < countFiles; i++) {
						 var reader = new FileReader();
						 reader.onload = function (e) {
							 $("<img />", {
								 "src": e.target.result,
									 "class": "thumb-image"
							 }).appendTo(image_holder);
						 }
						 image_holder.show();
						 reader.readAsDataURL($(this)[0].files[i]);
					 }
				 } else {
					 alert("This browser does not support FileReader.");
				 }
			 } else {
				 alert("Pls select only images");
			 }
 		});
		$("#fileUpload2").on('change', function () {
			 //Get count of selected files
			 var countFiles = $(this)[0].files.length;
			 var imgPath = $(this)[0].value;
			 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			 var image_holder = $("#image-holder2");
			 image_holder.empty();
			 if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
				 if (typeof (FileReader) != "undefined") {
					 //loop for each file selected for uploaded.
					 for (var i = 0; i < countFiles; i++) {
						 var reader = new FileReader();
						 reader.onload = function (e) {
							 $("<img />", {
								 "src": e.target.result,
									 "class": "thumb-image"
							 }).appendTo(image_holder);
						 }
						 image_holder.show();
						 reader.readAsDataURL($(this)[0].files[i]);
					 }
				 } else {
					 alert("This browser does not support FileReader.");
				 }
			 } else {
				 alert("Pls select only images");
			 }
 		});
	});//]]> 
</script>

<?php include "./pages/footer.php" ?>

<script>
  $(function () {
    	CKEDITOR.replace('elm_stay');
    	CKEDITOR.replace('elm_dine');
    	CKEDITOR.replace('elm_weddings');
    	CKEDITOR.replace('elm_events');
    	CKEDITOR.replace('elm_experience');
    	CKEDITOR.replace('elm_gallery');
    	CKEDITOR.replace('elm_specialoffers');
    	CKEDITOR.replace('elm_thingstodo');
    	CKEDITOR.replace('elm_agra');
    	CKEDITOR.replace('elm_media');
    	CKEDITOR.replace('elm_about');
    	CKEDITOR.replace('elm_career');
    	CKEDITOR.replace('elm_reviews');
    	CKEDITOR.replace('elm_privacy');
    	CKEDITOR.replace('elm_terms');
    	CKEDITOR.replace('elm_contact');
  })
</script>
