<?php include("include/header.php");?>

<section class="hero-wrap hero-wrap-2 banner-image-issue" style="background-image:url(images/banner.jpg)">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-md-9 pt-5 text-center">
 
<h1 class="mb-0 bread banner-heading">CONTACT US</h1>
</div>
</div>
</div>
</section>
<?php include("include/booking.php");?>
<section class="ftco-section ftco-about-section bg-white">
<div class="container-xl">
<div class="row g-xl-5">
<div class="col-md-12 heading-section  align-items-center text-center">
<!--<h2 class="mb-4">Contact us</h2>-->

<p class="mb-4"> Do you have any questions about our hotel or add any additional information to your reservation,  please do not hesitate to contact us by this form. After ‘send’ we will replay within 24hours. </p>
</div>
</div>
</div>
</section>
<section class="ftco-section bg-light">
<div class="container">
<div class="row no-gutters justify-content-center">
<div class="col-md-12">
<div class="wrapper">
<div class="row g-0">
<div class="col-lg-6">
<div class="contact-wrap w-100 p-md-5 p-4">

<div class="row mb-4">
<div class="col-md-12">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>Address:</span> 
Greenheart Boutique Hotel
Costerstraat 68-70
Paramaribo, Suriname, South-America

</p>
</div>
</div>
</div>
<div class="col-md-12">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>Email:</span> <a href="mailto:info@greenheartboutiquehotel.com"><span class="__cf_email__">info@greenheartboutiquehotel.com</span></a></p>
</div>
</div>
</div>
<div class="col-md-12">
<div class="dbox w-100 d-flex align-items-start">
<div class="text">
<p><span>Phone:</span> <a href="tel:+5977627600"><i class="fa fa-whatsapp"></i> +597 7627600</a></p>
</div>
</div>
</div>
</div>
<form id="contactForm" action="nullamdictumfeliseupede.php" method="post" name="contact_form_today" class="contactForm" onsubmit="return validate_contact_form_now();">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="name" id="name" placeholder="Name" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="email" class="form-control" name="email" id="email" placeholder="Email" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" maxlength="10" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Create a message here"></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="sum" id="sum" placeholder="Sum=1+3" >
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<div class="g-recaptcha" data-sitekey="6LfrDZ8pAAAAAAcIw8Ddkp1hP2QnKu4rqSVm5kQT"></div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="submit" value="Send Message" class="btn btn-primary send-contact">
<div class="submitting"></div>
</div>
</div>
</div>
</form>
 
</div>
</div>
<div class="col-lg-6 d-flex align-items-stretch">
<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d127013.43549066961!2d-55.22382959925735!3d5.8316626727342635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8d08354ca3df385d%3A0x87800b6d77834691!2sGreenheart%20Boutique%20Hotel%2C%20Costerstraat%2020%2C%20Paramaribo%2C%20Suriname!3m2!1d5.831669499999999!2d-55.153793799999995!5e0!3m2!1sen!2sin!4v1668172830940!5m2!1sen!2sin" width="100%" height="725" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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