<?php include("include/header.php");?> <style>
  .filters ul {
    list-style: none;
    padding: 20px 0;
    text-align: center;
  }

  .filters .button.is-checked {
    color: #fff;
    border: 1px solid #0e2c14;
    border-radius: 0px;
    background: #0e2c14;
  }

  .filters .button {
    margin: 0px 4px;
    display: inline;
    padding: 2px 15px;
    font-size: 16px;
    color: #636363;
    font-weight: 400;
    cursor: pointer;
    letter-spacing: inherit;
    color: #000;
    text-transform: uppercase;
    background: #fff;
    border: 1px solid #444;
  }

  .filters .button:hover {
    color: white;
    background: #0e2c14;
    border-radius: 0px
  }

  .box-width {
    width: 33.33%;
    float: left;
    padding: 10px;
    height: 235px;
    overflow: hidden;
  }

  .box-width a.example-image-link img {
    object-fit: cover;
    height: 100%;
    width: 100%;
  }

  img.img-fluid.mb-3 {
    width: 160px;
  }

  .icon-rooms li span .img-fluid {
    display: block;
    margin: auto;
  }

  @media(max-width:576px) {
    .box-width {
      width: 50%;
      height: auto;
    }

    .filters .button {
      margin: 4px 2px;
      font-size: 12px;
    }
  }
</style>
<section class="hero-wrap hero-wrap-2 banner-image-issue" style="background-image:url(images/banner.jpg)">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 pt-5 text-center">
        <h1 class="mb-0 bread banner-heading">Gallery - Greenheart Boutique Suriname</h1>
      </div>
    </div>
  </div>
</section> <?php include("include/booking.php");?> <section class="gallery_sec_box">
  <div class="gallery_home">
    <div class="container">
      <div class="row">
        <!-- <h1 class="text-center mt-2">Hotel Gallery - Greenheart Boutique Hotel Suriname </h1>-->
        <div class="col-sm-12 nopadding"></div>
      </div>
      <div class="row">
        <div class="col-sm-12 nopadding">
          <div class="filters button-group filters-button-group">
            <button class="button is-checked" data-filter="*">All</button>
            <button class="button" data-filter=".rooms">Rooms</button>
            <button class="button" data-filter=".dine">Restaurant</button>
            <button class="button" data-filter=".facilities">Facility & Services</button>
            <button class="button" data-filter=".nature">Nature & Culture</button>
            <button class="button" data-filter=".More">More</button>
          </div>
        </div>
      </div>
      <div class="content grid grids row">
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/1.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/11.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/11.jpg" alt="reception area 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/10.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/10.jpg" alt="Xmas Tree">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/9.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/9.jpg" alt="Door Bell">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/8.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/8.jpg" alt="balcony">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/7.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/7.jpg" alt="Tree on Table">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/6.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/6.jpg" alt="balcony 4">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/5.jpg" alt="flower on Table">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/4.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/4.jpg" alt="swimming Poll Area">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/3.jpg" alt="Santa Table">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/2.jpg" alt="Night View Siwimmingpool 2">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width" data-category="exterior">
          <a class="example-image-link" href="./images/gallery/13.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./images/gallery/13.jpg" alt="parrot green">
          </a>
        </div>
        <div class="single-content grid-item element-item dine box-width" data-category="exterior">
          <a class="example-image-link" href="./gallery/restaurant1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/restaurant1.jpg" alt="Breakfast Area">
          </a>
        </div>
		<div class="single-content grid-item element-item dine box-width" data-category="exterior">
          <a class="example-image-link" href="./gallery/restaurant2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/restaurant2.jpg" alt="Breakfast Area">
          </a>
        </div>
		<div class="single-content grid-item element-item dine box-width" data-category="exterior">
          <a class="example-image-link" href="./gallery/restaurant3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/restaurant3.jpg" alt="Breakfast Area">
          </a>
        </div>
		<div class="single-content grid-item element-item dine box-width" data-category="exterior">
          <a class="example-image-link" href="./gallery/restaurant4.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/restaurant4.jpg" alt="Breakfast Area">
          </a>
        </div>
		<div class="single-content grid-item element-item dine box-width" data-category="exterior">
          <a class="example-image-link" href="./gallery/restaurant5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/restaurant5.jpg" alt="Breakfast Area">
          </a>
        </div>
        <div class="single-content grid-item  element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room1.jpg" alt="Garnden Room">
          </a>
        </div>
		<div class="single-content grid-item  element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room2.jpg" alt="Garnden Room">
          </a>
        </div>
       
        <div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room3.jpg" alt="Bed Room 2">
          </a>
        </div>
		<div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room4.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room4.jpg" alt="Bed Room 2">
          </a>
        </div>
        <div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room5.jpg" alt="Deluxe Room">
          </a>
        </div>
		
        <div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room6.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room6.jpg" alt="Standard Room">
          </a>
        </div>
		<div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room7.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room7.jpg" alt="Standard Room">
          </a>
        </div>
		<div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room8.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room8.jpg" alt="Standard Room">
          </a>
        </div>
		<!-- <div class="single-content grid-item element-item rooms box-width " data-category="exterior">
          <a class="example-image-link" href="./gallery/room9.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="./gallery/room9.jpg" alt="Standard Room">
          </a>
        </div> -->
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/2.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-packages1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-packages1.jpg" alt="Birds on tree">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-packages2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-packages2.jpg" alt="Waterwall">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-packages3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-packages3.jpg" alt="Monkey in Jungle 2">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-img.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-img.jpg" alt="men Fishing">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-packages5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-packages5.jpg" alt="Monkey in Jungle">
          </a>
        </div>
        <div class="single-content grid-item element-item nature box-width " data-category="exterior">
          <a class="example-image-link" href="images/nature-packages6.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/nature-packages6.jpg" alt="Dolphin in Water">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/3.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/4.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/4.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities1.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities2.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities3.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities3.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities4.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities4.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities6.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities6.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities7.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities7.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities8.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities8.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities9.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities9.jpg" alt="Library Area">
          </a>
        </div>
		<div class="single-content grid-item element-item facilities box-width " data-category="exterior">
          <a class="example-image-link" href="gallery/facilities5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/facilities5.jpg" alt="Library Area">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width " data-category="exterior">
          <a class="example-image-link" href="images/gallery2.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/gallery2.jpg" alt="reception area 2">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/5.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/5.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/6.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/6.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/7.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/7.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <!-- <div class="single-content grid-item element-item More box-width " data-category="exterior"><a class="example-image-link" href="images/gallery6.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="images/gallery6.jpg" alt="Garden Area"></a></div> -->
        <!-- new images -->
        <div class="single-content grid-item element-item More box-width " data-category="exterior">
          <a class="example-image-link" href="images/more1.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/more1.jpg" alt="Book Study Area">
          </a>
        </div>
        <!-- <div class="single-content grid-item element-item More box-width " data-category="exterior"><a class="example-image-link" href="images/more2.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="images/more2.jpg" alt="Restaurant Lobby 2"></a></div> -->
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/8.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/8.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/9.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/9.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <!-- <div class="single-content grid-item element-item More box-width " data-category="exterior"><a class="example-image-link" href="images/more5.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="images/more5.jpg" alt="reception area"></a></div> -->
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/10.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/10.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
        <!-- <div class="single-content grid-item element-item More box-width " data-category="exterior"><a class="example-image-link" href="images/more7.jpg" data-lightbox="example-set"><img class="example-image img-fluid" src="images/more7.jpg" alt="Night View Siwimmingpool"></a></div> -->
        <div class="single-content grid-item element-item More box-width " data-category="exterior">
          <a class="example-image-link" href="images/more8.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/more8.jpg" alt="Book gallery">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width " data-category="exterior">
          <a class="example-image-link" href="images/more9.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="images/more9.jpg" alt="Soap & gell">
          </a>
        </div>
        <div class="single-content grid-item element-item More box-width" data-category="exterior">
          <a class="example-image-link" href="gallery/11.jpg" data-lightbox="example-set">
            <img class="example-image img-fluid" src="gallery/11.jpg" alt="Night View Siwimmingpool 3">
          </a>
        </div>
      </div>
    </div>
  </div>
</section> <?php include("include/footer.php");?> <script>
  var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows'
  });
  var filterFns = {
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt(number, 10) > 50;
    },
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match(/ium$/);
    }
  };
  $('.filters-button-group').on('click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  $('.button-group').each(function(i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $(this).addClass('is-checked');
    });
  });
</script>