<!DOCTYPE html>
<html lang="en">
<head> 
<?php include("./include/metatags.php");?>
<title><?php echo $metatitle; ?></title>
<meta name="description" content="<?php echo $metadesc; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"  />
<link rel="stylesheet" href="fonts/font-awesome/4.7.0/css/font-awesome.min.css" media="all">
<link rel="stylesheet" href="css/ionicons.min.css" media="all">
<link media="all" rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.min.css">
<!-- New fonts ds start -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Antic+Didone&family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
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
<!-- HTML Meta Tags -->
<title>Hotel in Paramaribo, Suriname - Greenheart Boutique Hotel</title>
<meta name="description" content="One of the best hotels in Paramaribo, Suriname - Greenheart boutique Hotel offers all kinds of modern amenities with world-class accommodations, which feel like a home away from home. Enquire Now.">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://www.greenheartboutiquehotel.com/">
<meta property="og:type" content="website">
<meta property="og:title" content="Hotel in Paramaribo, Suriname - Greenheart Boutique Hotel">
<meta property="og:description" content="One of the best hotels in Paramaribo, Suriname - Greenheart boutique Hotel offers all kinds of modern amenities with world-class accommodations, which feel like a home away from home. Enquire Now.">
<meta property="og:image" content="https://www.greenheartboutiquehotel.com/images/webp/4.webp">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="greenheartboutiquehotel.com">
<meta property="twitter:url" content="https://www.greenheartboutiquehotel.com/">
<meta name="twitter:title" content="Hotel in Paramaribo, Suriname - Greenheart Boutique Hotel">
<meta name="twitter:description" content="One of the best hotels in Paramaribo, Suriname - Greenheart boutique Hotel offers all kinds of modern amenities with world-class accommodations, which feel like a home away from home. Enquire Now.">
<meta name="twitter:image" content="https://www.greenheartboutiquehotel.com/images/webp/4.webp">
<!-- Meta Tags Generated via https://www.opengraph.xyz -->

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Green Heart Boutique Hotel",
  "url": "https://www.greenheartboutiquehotel.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.greenheartboutiquehotel.com/rooms.php{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<link rel="stylesheet" href="css/allStyle.min.css" media="all">
<link rel="stylesheet" href="css/custom.min.css" media="all">
</head>

<body>

<header class="site-header">
  <div class="container">
    <div class="row header-flex">
      <div class=" col-md-4 col-sm-4 toggle-btn text-left">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ds-navbar" aria-controls="ds-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> 
        </button>

        <a href="tel:+5977627600" class="header-number"> <span class="icon fa fa-phone"></span>+597 7627600</a>
      </div>
      <div class=" col-md-4 col-sm-4 logo-box text-center">
        <div class="logo"> <a href="index.php"> <img src="images/logo-white.png" class="logo-top"> </a> </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4    button-box text-right">
        <div class="language-box">
          <select name="forma" id='SelectOption' onchange="CallChangeCity(this.options[this.selectedIndex].value)">
            <option  value="http://www.greenheartboutiquehotel.com/dutch-version/"><a href="#">DUTCH   </a></option>
            <option value="http://www.greenheartboutiquehotel.com/" >ENG <i class="fa-solid fa-chevron-down"></i></option>
          </select>
        </div>
        <button class="btn cs-btn Bk-btn">Boek nu </button>
      </div>
    </div>
  </div>
</header> 
<div class="side-bar">
  <div class="close-btn"><span class="fa fa-close"></span>  </div>  
  <ul class="navbar-nav">
  <li class="nav-item"><a class="nav-link" href="history.php">Geschiedenis</a></li>
  <li class="nav-item"><a class="nav-link" href="rooms.php">Hotelkamers</a></li>
  <li class="nav-item"><a class="nav-link" href="dine.php">Restaurant &amp; Meetings</a></li>
  <li class="nav-item"><a class="nav-link" href="event.php">Event</a></li>
  <li class="nav-item"><a class="nav-link" href="service-and-facilities.php">Faciliteiten & Diensten </a></li>
  <li class="nav-item"><a class="nav-link" href="nature-packages.php">Nature</a></li> 
  <!--<li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>  -->
  <li class="nav-item"><a class="nav-link" href="gallery.php">Foto's</a></li>
  <li class="nav-item"><a class="nav-link" href="https://www.greenheartboutiquehotel.com/blog/" target="_blank">Blogs</a></li>
  <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
  </ul>
</div>
