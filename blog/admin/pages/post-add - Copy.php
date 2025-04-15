<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	

<script type="text/javascript">
	var save_action;
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			$.ajax({
				type 		: 'POST',
				url 		: './pages/f-post-add.php',
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
					window.location = '?dispatch=post';
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

<link rel="stylesheet" href="tags/stylesheets/inputTag.css">
<script src="tags/js/tag-input.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>Post</h1>
	  	<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Post</li>
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
						<label for="elm_title">Tags</label>
						<div class="form-group" id="tags">
								<input type="text" id="add_tag" class="form-control" name="form_data[tags]" id="tags" value="" />
								<div class="tags_dropdown">
								</div>
						</div>
							
							<div class="form-group">
								<label for="elm_title">Category</label>
								<select name="form_data[category_id]" id="category_id" class="form-control">
								<option value="">Select Category</option>
								<?php 
									$cat_results = $mysqli->query("SELECT * FROM `category` WHERE `Status` = 'Active'");
									if ($cat_results->num_rows) { 
									while($cat_obj = $cat_results->fetch_object()){
								?>
									<option value="<?php echo $cat_obj->id; ?>"><?php echo $cat_obj->title; ?></option>
								<?php } } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="elm_title">Title</label>
								<input type="text" class="form-control" name="form_data[title]" id="elm_title" value="" />
							</div>
						
							<div class="form-group">
								<label for="elm_description">Description</label>
								<textarea class="form-control" name="form_data[description]" id="elm_description" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label>Picture</label>
								<div class="previewHolder">
									<input type="file" id="fileUpload1" name="fileUpload1" /><br />
									<input type="hidden" name="form_data[Pic1]" id="elm_pic1" value="" />
									<div id="image-holder1"><img class="previewImage" src="../assets/img/post/" style="height:100px;" alt="" /></div><br /><br />
								</div>
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
								
								<?php if($resultsSO = $mysqli->query("SELECT * FROM `post`")) { $SortOrderNumber = $resultsSO->num_rows+1; } ?>
								
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
<script>
    new inputTags({
        asd : true,
       id: 'add_tag',
       //tags : ['html', 'css', 'js', 'php', 'sql'],
       tags : ['tags'],
       maxTags : 20,
       allowDuplicateTags : false,
       onTagRemove : function (tag) {
         alert( tag + "Tag is going to be removed");
       },
    });
</script>
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
