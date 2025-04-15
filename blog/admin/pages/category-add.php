<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			$.ajax({
				type 		: 'POST',
				url 		: './pages/f-category-add.php',
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
					window.location = '?dispatch=category';
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
	  	<h1>Category</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Category</li>
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
										<label for="elm_name">Title</label>
										<input type="text" class="form-control" name="form_data[title]" id="elm_name" value="" />
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="elm_message_cat">Description</label>
								<textarea class="form-control" name="form_data[description]" id="elm_message_cat" rows="3"></textarea>
								<script>
										CKEDITOR.replace( 'form_data[description]' );
								</script>
							</div>
							<div class="form-group">
								<label for="meta_title">Meta Title</label>
								<input type="text" class="form-control" name="form_data[meta_title]" id="meta_title" value="" />
							</div>
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords</label>
								<input type="text" class="form-control" name="form_data[meta_keywords]" id="meta_keywords" value="" />
							</div>
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<textarea class="form-control" name="form_data[meta_description]" id="meta_description" rows="4" cols="50">
								</textarea>
							</div>
							<div class="clearfix"></div>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="elm_status">Status</label>&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_active" value="Active" checked="checked" />&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;
										<input type="radio" name="form_data[Status]" id="elm_status_disabled" value="Disabled" />&nbsp;&nbsp;Disabled
									</div>
								</div>
								
								<?php if($resultsSO = $mysqli->query("SELECT * FROM `category`")) { $SortOrderNumber = $resultsSO->num_rows+1; } ?>
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="input-group">
                    						<span class="input-group-addon">Sorting Order</span>
											<input type="text" class="form-control" name="form_data[SortOrder]" id="elm_sortorder" value="<?php echo $SortOrderNumber; ?>" onKeyPress="return isNumber(event)" />
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
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
 CKEDITOR.replace( 'elm_message_cat', {
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
</script>
<script>
  $(function () {
    	CKEDITOR.replace('elm_message');
  })
</script>
