<!DOCTYPE html>
<html lang="en">
<head>
<?php include("./include/metatags.php");?>
<title><?php echo $metatitle; ?></title>
<meta name="description" content="<?php echo $metadesc; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-site-verification" content="SW0e6WNFHJM0yu8urMlIvT7BDqv8b5Q8cwWqwKp7rBw">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link media="all" rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.min.css">
<!-- New fonts ds start -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"  />
<!-- New fonts ds end -->
<?php  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
     $url = "https://";   
else  
$url = "http://";  
$url.= $_SERVER['HTTP_HOST'];  
$url.= $_SERVER['REQUEST_URI'];    
$url2.= $_SERVER['REQUEST_URI'];    
$url3= stristr($url2,"?",true);  
if(empty($url3)){
  $url3= $_SERVER['REQUEST_URI']; 
}
?> 
<link rel="canonical" href="https://www.greenheartboutiquehotel.com<?php echo $url3;?>">

<link rel="stylesheet" href="css/allStyle.css" />
<link rel="stylesheet" href="css/custom.css" />
<!-- <style> 
</style> -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TJPHH3L');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJPHH3L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="site-header">
  <div class="container">
    <row class="row header-flex">
      <div class="col-md-4 col-sm-4  toggle-btn text-left ">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ds-navbar" aria-controls="ds-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> 
        </button>

        <a href="tel:+5977627600" class="header-number"> <span class="icon fa fa-phone"></span>+597 7627600</a>
      </div>
      <div class="col-md-4 col-sm-4   logo-box text-center">
        <div class="logo"> <a href="/"> <img src="images/logo-white.png" class="logo-top"> </a> </div>
      </div>
      <div class="col-md-4 col-sm-4  button-box text-right">
        <div class="language-box">
          <select name="forma" id='SelectOption' onchange="CallChangeCity(this.options[this.selectedIndex].value)">
            <option value="http://www.greenheartboutiquehotel.com/">ENG <i class="fa-solid fa-chevron-down"></i></option>
            <option value="http://www.greenheartboutiquehotel.com/dutch-version/"><a href="#">DUTCH  <i class="fa-solid fa-chevron-down"></i> </a></option>
          </select>
        </div>

        <button class="btn cs-btn Bk-btn">Book Now </button>
      </div>
    </div>
  </div>
</header>

<div class="side-bar">
  <div class="close-btn"><span class="fa fa-close"></span>  </div>
  
  <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
    <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
    <li class="nav-item"><a class="nav-link" href="dine.php">Restaurant</a></li>
    <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>
    <li class="nav-item"><a class="nav-link" href="service-and-facilities.php">Services & Facilities</a></li>
    <li class="nav-item"><a class="nav-link" href="nature-packages.php">Nature & Culture</a></li> 
    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
    <li class="nav-item"><a class="nav-link" href="https://www.greenheartboutiquehotel.com/blog/" target="_blank">Blogs</a></li>
    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
  </ul>
</div>





