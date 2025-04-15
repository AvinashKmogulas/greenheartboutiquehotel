<?php include("include/header.php");?>


<section class="ftco-section bg-light">
<div class="container">
<div class="row no-gutters justify-content-center">
<div class="col-md-12">
<div class="wrapper">
<div class="row g-0">
<div class="col-lg-12">
<div class="contact-wrap w-100 p-md-5 p-4">
<h3>Thank You</h3>
<p class="mb-4"> Thank you for contacting us. we will get back to you.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<?php include("include/footer.php");?>
<script>
	function contactFormValid2() {
		var name = document.contactForm.name;
		var email = document.contactForm.email;
		var phone = document.contactForm.phone;
		var subject = document.contactForm.subject;
		var comment = document.contactForm.message;
		if (!validate_name(name)) {
			return false;
		}
		if (!validate_email(email)) {
			return false;
		}
		if (!validate_mobile(phone)) {
			return false;
		}
		if (!validate_required(subject,"Please enter subject")) {
			return false;
		}
		if (!validate_required(comment,"Please enter message")) {
			return false;
		}
};
/*  */
</script>