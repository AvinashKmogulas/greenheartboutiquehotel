<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			var formData = new FormData(document.getElementById("update_form"));
			$.ajax({
				type 		: 'POST',
				url 		: './pages/f-banners-add.php',
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
					window.location = '?dispatch=banners';
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
						<h3 class="box-title">Add Form</h3>
					</div><!-- /.box-header -->
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="elm_title1">Banner Title</label>
										<input type="text" class="form-control" name="form_data[Title]" id="elm_title1" value="" />
									</div>
		
									<!--<div class="form-group">
										<label for="elm_title2">Banner Title 2</label>
										<input type="text" class="form-control" name="form_data[Title2]" id="elm_title2" value="" />
									</div>-->
									
									<div class="form-group">
										<label>Picture</label>
										<div class="previewHolder">
											<input type="file" id="fileUpload1" name="fileUpload1" /><br />
											<input type="hidden" name="form_data[Pic1]" id="elm_pic1" value="" />
											<div id="image-holder1"><img class="previewImage" src="assets/img/banners/" style="width:300px;" alt="" /></div><br /><br />
										</div>
									</div>
								
								</div>

								<div class="col-md-6">
									<div class="well well-sm no-shadow">
										<div class="box-header"><h3 class="box-title">Filters</h3></div>
										<div class="box-body">
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_home" value="Home" />&nbsp;&nbsp;&nbsp;Home</label></div></div>
											<!--<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_stay" value="Stay" />&nbsp;&nbsp;&nbsp;Stay</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_dine" value="Dine" />&nbsp;&nbsp;&nbsp;Dine</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_weddings" value="Weddings" />&nbsp;&nbsp;&nbsp;Weddings</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_events" value="Events" />&nbsp;&nbsp;&nbsp;Events</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_experience" value="Experience" />&nbsp;&nbsp;&nbsp;Experience</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_agra" value="Agra" />&nbsp;&nbsp;&nbsp;Agra</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_offers" value="Offers" />&nbsp;&nbsp;&nbsp;Special Offers</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_explore" value="Explore" />&nbsp;&nbsp;&nbsp;Explore</label></div></div>
											
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_reviews" value="Reviews" />&nbsp;&nbsp;&nbsp;Reviews</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_sitemap" value="Sitemap" />&nbsp;&nbsp;&nbsp;Sitemap</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_career" value="Career" />&nbsp;&nbsp;&nbsp;Career</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_media" value="Media" />&nbsp;&nbsp;&nbsp;Media</label></div></div>
											-->
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_gallery" value="Gallery" />&nbsp;&nbsp;&nbsp;Gallery</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_about" value="About" />&nbsp;&nbsp;&nbsp;About</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_contact" value="Contact" />&nbsp;&nbsp;&nbsp;Contact</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_thankyou" value="Thankyou" />&nbsp;&nbsp;&nbsp;Thank You</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_terms" value="Terms" />&nbsp;&nbsp;&nbsp;Terms n Conditions</label></div></div>
											<div class="col-md-4"><div class="form-group"><label><input type="radio" name="form_data[BannerType]" id="elm_type_privacy" value="Privacy" />&nbsp;&nbsp;&nbsp;Privacy Policy</label></div></div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="elm_status">Status</label>&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_active" value="Active" checked="checked" />&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_disabled" value="Disabled" />&nbsp;&nbsp;Disabled
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group">
                    						<span class="input-group-addon">Sorting Order</span>
											<input type="text" class="form-control" name="form_data[SortOrder]" id="elm_sortorder" value="" />
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
</script>

<?php include "./pages/footer.php" ?>

