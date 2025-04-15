<?php $id = $_GET["id"]; ?>      
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
				url 		: './pages/f-onestopshopbusinessevents-update.php?id=<?php echo $id ?>', // the url where we want to POST
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
					window.location = 'index.php?dispatch=onestopshopbusinessevents';
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
	  	<h1>One Stop Shop Business Events</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">One Stop ShopBusiness Events</li>
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
					$results = $mysqli->query("SELECT * FROM `OneStopShopBusinessEvents` WHERE `ID` = ".$id);
					if ($results) { $obj = $results->fetch_object(); }
					?>
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="elm_title">Title</label>
								<input type="text" class="form-control" name="form_data[Title]" id="elm_title" value="<?php echo $obj->Title ?>" />
							</div>
							
							<div class="form-group">
								<label>Picture</label>
								<div class="previewHolder">
									<input type="file" id="fileUpload1" name="fileUpload1" /><br />
									<input type="hidden" name="form_data[Pic1]" id="elm_pic1" value="<?php echo $obj->Pic ?>" />
									<div id="image-holder1"><img class="previewImage" src="../assets/img/onestopshopbusinessevents/<?php echo $obj->Pic ?>" style="height:100px;" alt="" /></div><br /><br />
								</div>
							</div>
							
							<div class="clearfix"></div>
							
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

<script>
  $(function () {
    	CKEDITOR.replace('elm_description');
  })
</script>
