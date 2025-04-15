<?php $id = $_GET["id"]; ?>      
<?php include "./pages/header.php" ?>	  
<?php include "./pages/sidebar.php" ?>	
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#update_form').submit(function(event) {
			for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
			var formData = new FormData(document.getElementById("update_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/f-post-update.php?id=<?php echo $id ?>', // the url where we want to POST
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
					window.location = 'index.php?dispatch=post';
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
						<h3 class="box-title">Update Form</h3>
					</div><!-- /.box-header -->
					
					<?php 
					$results = $mysqli->query("SELECT * FROM `post` WHERE `id` = ".$id);
					if ($results) { $obj = $results->fetch_object(); }
					?>
									
					<!-- form start -->
					<form role="form" method="post" name="update_form" id="update_form" enctype="multipart/form-data">
						<div class="box-body">
							<label for="elm_title">Tags 
										<?php 
										$explodeStr='';
										$explode=explode(',',$obj->tags); 
										foreach($explode as $key=>$value){
											$explodeStr.='\'';
											$explodeStr.=$value;
											$explodeStr.='\',';
										}
										$explodeNewStr=rtrim($explodeStr,',');
										$explodeNewStr=(!empty($obj->tags)) ? $explodeNewStr : '\'tags\'';
										?>
							</label>
							<div class="form-group" id="tags">
									<input type="text" id="add_tag" class="form-control" name="form_data[tags]" id="tags" value="<?php //echo $obj->tags ?>" />
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
									<option <?php echo ($obj->category_id==$cat_obj->id) ? 'selected=selected' : ''; ?> value="<?php echo $cat_obj->id; ?>"><?php echo ucwords($cat_obj->title); ?></option>
								<?php } } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="elm_title">Title</label>
								<input type="text" class="form-control" name="form_data[title]" id="elm_title" value="<?php echo ucwords($obj->title); ?>" />
							</div>
							<div class="form-group">
								<label for="post_date">Post Date</label>
								<input type="text" class="form-control" name="form_data[post_date]" id="post_date" value="<?php echo ucwords($obj->post_date); ?>" readonly/>
							</div>
							<div class="form-group">
								<label for="urlslug">Url Slug</label>
								<input type="text" class="form-control" name="form_data[urlslug]" id="urlslug" value="<?php echo $obj->urlslug; ?>" />
							</div>
							<div class="form-group">
								<label for="elm_description_post">Description</label>
								<textarea class="form-control" name="form_data[description]" id="elm_description_post" rows="3"><?php echo $obj->description ?></textarea>
									<script>
										CKEDITOR.replace( 'form_data[description]' );
									</script>
							</div>

							<div class="form-group">
								<label>Picture</label>
								<div class="previewHolder">
									<input type="file" id="fileUpload1" name="fileUpload1" /><br />
									<input type="hidden" name="form_data[Pic1]" id="elm_pic1" value="<?php echo $obj->image ?>" />
									<div id="image-holder1"><img class="previewImage" src="assets/img/post/<?php echo $obj->image ?>" style="height:100px;" alt="" /></div><br /><br />
								</div>
							</div>
							<div class="form-group">
								<label for="meta_title">Meta Title</label>
								<input type="text" class="form-control" name="form_data[meta_title]" id="meta_title" value="<?php echo ucwords($obj->meta_title); ?>" />
							</div>
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords</label>
								<input type="text" class="form-control" name="form_data[meta_keywords]" id="meta_keywords" value="<?php echo ucwords($obj->meta_keywords); ?>" />
							</div>
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<textarea class="form-control" name="form_data[meta_description]" id="meta_description" rows="4" cols="50">
								<?php echo ucwords($obj->meta_description); ?>
								</textarea>
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

<script>
    new inputTags({
        asd : true,
       id: 'add_tag',
       //tags : ['html', 'css', 'js', 'php', 'sql'],
       tags : [<?php echo $explodeNewStr;?>],
       maxTags : 20,
       allowDuplicateTags : false,
       onTagRemove : function (tag) {
         //alert( tag + "Tag is going to be removed");
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
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
 CKEDITOR.replace( 'elm_description_post', {
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
</script>
<script>
  $(function () {
    	CKEDITOR.replace('elm_description');
		
		var in1 = setInterval(function() {
		if(typeof $().datepicker() != "undefined") {
			$('#post_date').datepicker({
				format: 'yyyy-mm-dd',
				defaultDate: new Date()
			});
			//$('#post_date').datepicker('setDate', new Date());
			clearInterval(in1);
			} 
		  } , 1000);
  })
</script>
