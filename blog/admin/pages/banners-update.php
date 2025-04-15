<?php $id = $_GET["id"]; ?>      
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			var formData = new FormData(document.getElementById("update_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: 'pages/f-banners-update.php?id=<?php echo $id ?>', // the url where we want to POST
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
					window.location = 'index.php?dispatch=banners';
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
	  	<h1>Banners</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Banners</li>
	  	</ol>
	</section>
	
	<style>
	/*.previewImage { margin:10px 0px; }*/
	.thumb-image { float:left; width:300px; position:relative; padding:5px; margin-bottom:20px; }
	</style>

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
					$results = $mysqli->query("SELECT * FROM `Banners` WHERE `ID` = ".$id);
					if ($results) { $obj = $results->fetch_object(); }
					?>
						
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_title1">Banner Title </label>
										<input type="text" class="form-control" name="form_data[Title]" id="elm_title1" value="<?php echo $obj->Title ?>" />
									</div>
									
									<!--<div class="form-group">
										<label for="elm_title2">Banner Title 2</label>
										<input type="text" class="form-control" name="form_data[Title2]" id="elm_title2" value="<?php echo $obj->Title2 ?>" />
									</div>-->
									
									<div class="form-group">
										<label>Picture</label>
										<div class="previewHolder">
											<input type="file" id="fileUpload1" name="fileUpload1" /><br />
											<input type="hidden" name="form_data[Pic1]" id="elm_pic1" value="<?php echo $obj->Pic ?>" />
											<div id="image-holder1"><img class="previewImage" src="assets/img/banners/<?php echo $obj->Pic ?>" style="width:300px;" alt="" /></div><br /><br />
											<!--img class="previewImage" src="http://placehold.it/100x100" style="height:200px;" alt="your image" /><br />
											<input type='file' id="inputFile" /-->
										</div>
									</div>
									
								</div>

								<div class="col-md-6">
									<div class="well well-sm no-shadow">
										<div class="box-header"><h3 class="box-title">Category</h3></div>
										<div class="box-body">
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_home" value="Home" <?php if($obj->BannerType == "Home"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Home</label></div></div>
											<!--<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_stay" value="Stay" <?php if($obj->BannerType == "Stay"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Stay</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_dine" value="Dine" <?php if($obj->BannerType == "Dine"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Dine</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_weddings" value="Weddings" <?php if($obj->BannerType == "Weddings"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Weddings</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_events" value="Events" <?php if($obj->BannerType == "Events"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Events</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_experience" value="Experience" <?php if($obj->BannerType == "Experience"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Experience</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_agra" value="Agra" <?php if($obj->BannerType == "Agra"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Agra</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_offers" value="Offers" <?php if($obj->BannerType == "Offers"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Special Offers</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_explore" value="Explore" <?php if($obj->BannerType == "Explore"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Explore</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_sitemap" value="Sitemap" <?php if($obj->BannerType == "Sitemap"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Sitemap</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_career" value="Career" <?php if($obj->BannerType == "Career"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Career</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_media" value="Media" <?php if($obj->BannerType == "Media"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Media</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_reviews" value="Reviews" <?php if($obj->BannerType == "Reviews"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Reviews</label></div></div>
											-->
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_gallery" value="Gallery" <?php if($obj->BannerType == "Gallery"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Gallery</label></div></div>
											
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_about" value="About" <?php if($obj->BannerType == "About"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;About</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_contact" value="Contact" <?php if($obj->BannerType == "Contact"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Contact</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_thankyou" value="Thankyou" <?php if($obj->BannerType == "Thankyou"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Thank You</label></div></div>
											
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_terms" value="Terms" <?php if($obj->BannerType == "Terms"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Terms n Conditions</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_privacy" value="Privacy" <?php if($obj->BannerType == "Privacy"){ ?>checked="checked"<?php } ?> />&nbsp;&nbsp;&nbsp;Privacy Policy</label></div></div>
										</div>
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
	});//]]> 
	
	$(function() {
		$('#elm_offer_duration').daterangepicker({timePicker: true, timePickerIncrement:1, format: 'MM/DD/YYYY h:mm A'});
	});
</script>

<?php include "./pages/footer.php" ?>

