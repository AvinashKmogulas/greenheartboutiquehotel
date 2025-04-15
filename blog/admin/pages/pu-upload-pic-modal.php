<script type="text/javascript">
function fetch_pics(cid, scid) {
	$.ajax({
		url: './pages/pu-fetch-pics.php',
		type: 'get',
		data: {'cid': cid,  'scid': scid},
		success: function(data, status) { document.getElementById("picsPanel").innerHTML = data; },
		error: function(xhr, desc, err) {
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	}); // end ajax call	
}
fetch_pics(<?php echo $cat_id ?>, <?php echo $subcat_id ?>);
</script>

<script type='text/javascript'>
	$(document).on("click", ".open-UploadPicModal", function () {
		var pic_cat_id = $(this).data('cid');
		var pic_subcat_id = $(this).data('scid');
		$(".modal-footer #txtUploadPicModalCategoryID").val( pic_cat_id );
		$(".modal-footer #txtUploadPicModalSubCategoryID").val( pic_subcat_id );
	});

	$(document).ready(function() {
		$('#pic_upload_form').submit(function(event) {
			var formData = new FormData(document.getElementById("pic_upload_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/pu-upload-pic.php', // the url where we want to POST
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
						$("#txtUploadPicModalTitle").css('border-color','#f00');
					}
				} else {
			  		$("#UploadPicModal").modal('hide'); 
					fetch_pics(<?php echo $cat_id ?>, <?php echo $subcat_id ?>);
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

	$(window).load(function(){
		$("#UploadPicModalFile").on('change', function () {
			 //Get count of selected files
			 var countFiles = $(this)[0].files.length;
			 var imgPath = $(this)[0].value;
			 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			 var image_holder = $("#imgHolderUploadPicModal");
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
	}); 
	
	$(document).ready(function() {
		$("#resetUploadPicModal").click(function() {
			$("#txtUploadPicModalTitle").val("");
			$("#txtUploadPicModalFile").val("");
			$("#txtUploadPicModalCategoryID").val("");
			$("#txtUploadPicModalSubCategoryID").val("");
			var imgHolderUploadPicModal = $("#imgHolderUploadPicModal");
			imgHolderUploadPicModal.empty();
		});
	});
</script>

<!-- Upload Pic Form Modal -->
<div class="modal fade" id="UploadPicModal" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="resetUploadPicModal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><strong>Upload Picture</strong></h4>
			</div>
			
			<div id="frmUploadPicModal">
				<form role="form" method="post" name="pic_upload_form" id="pic_upload_form" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="txtUploadPicModalTitle">Title</label>
						<input type="text" class="form-control" name="form_data[UploadPicModalTitle]" id="txtUploadPicModalTitle" value="" />
					</div>

					<div class="form-group">
						<label>Picture</label>
						<div class="previewHolder">
							<input type="file" name="UploadPicModalFile" id="UploadPicModalFile" /><br />
							<input type="hidden" name="form_data[UploadPicModalPic]" id="txtUploadPicModalPic" value="" />
							<div id="imgHolderUploadPicModal"><img class="previewImage" src="../assets/img/pictures/" style="width:300px;" alt="" /></div><br /><br />
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="elm_status">Status</label>&nbsp;&nbsp;&nbsp;
								<input type="radio" name="form_data[Status]" id="elm_status_active" value="Active" checked="checked" />&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;
								<input type="radio" name="form_data[Status]" id="elm_status_disabled" value="Disabled" />&nbsp;&nbsp;Disabled
							</div>
						</div>
						
						<?php if($resultsSO = $mysqli->query("SELECT * FROM `Pictures` WHERE `CategoryID`=".$cat_id)) { $SortOrderNumber = $resultsSO->num_rows+1; } ?>
						
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">Sorting Order</span>
									<input type="text" class="form-control" name="form_data[SortOrder]" id="elm_sortorder" value="<?php echo $SortOrderNumber; ?>" />
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="clearfix"></div>
				<div class="modal-footer txt-center">
					<input type="hidden" name="form_data[UploadPicModalCategoryID]" id="txtUploadPicModalCategoryID" value="" />
					<input type="hidden" name="form_data[UploadPicModalSubCategoryID]" id="txtUploadPicModalSubCategoryID" value="" />
					<input type="submit" class="btn btn-primary" name="btnUploadPicModalSubmit" id="btnUploadPicModalSubmit" value="Upload" />
					<div class="spacer-20"></div>
				</div>
				</form>
			</div>
			
		</div>
	</div>
</div>			


<div class="modal fade" id="DeletePicConfirmModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<form role="form" method="post" name="pic_delete_form" id="pic_delete_form" enctype="multipart/form-data">
			<div class="modal-body">
				<p>You are about to delete one photo, this procedure is irreversible.</p>
				<p>Do you want to proceed?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
				<input type="hidden" name="form_data[DeletePicConfirmModalID]" id="txtDeletePicConfirmModalID" value="" />
				<input type="hidden" name="form_data[DeletePicConfirmModalCategoryID]" id="txtDeletePicConfirmModalCategoryID" value="" />
				<input type="hidden" name="form_data[DeletePicConfirmModalSubCategoryID]" id="txtDeletePicConfirmModalSubCategoryID" value="" />
				<input type="submit" class="btn btn-danger" name="btnDeletePicConfirmModal" id="btnDeletePicConfirmModal" value="Delete" />
			</div>
			</form>
		</div>
	</div>
</div>

<script type='text/javascript'>
	$(document).on("click", ".open-DeletePicConfirmModal", function () {
		var pic_id = $(this).data('id');
		var pic_cat_id = $(this).data('cid');
		var pic_subcat_id = $(this).data('scid');
		$(".modal-footer #txtDeletePicConfirmModalID").val( pic_id );
		$(".modal-footer #txtDeletePicConfirmModalCategoryID").val( pic_cat_id );
		$(".modal-footer #txtDeletePicConfirmModalSubCategoryID").val( pic_subcat_id );
	});

	$(document).ready(function() {
		$('#pic_delete_form').submit(function(event) {
			var formData = new FormData(document.getElementById("pic_delete_form"));
			// process the form
			$.ajax({
				type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url 		: './pages/pu-delete-pic.php', // the url where we want to POST
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
						//$("#txtUploadPicModalTitle").css('border-color','#f00');
					}
				} else {
			  		$("#DeletePicConfirmModal").modal('hide'); 
					fetch_pics(<?php echo $cat_id ?>, <?php echo $subcat_id ?>);
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


