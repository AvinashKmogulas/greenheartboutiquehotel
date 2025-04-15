<?php
	require('./includes/config.php');
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	
	$dispatch = (isset($_GET['dispatch']) && $_GET['dispatch'] != '') ? $_GET['dispatch'] : "";
	$return_url = (isset($_GET['return_url']) && $_GET['return_url'] != '') ? $_GET['return_url'] : "";
	$user_type = (isset($_GET['user_type']) && $_GET['user_type'] != '') ? $_GET['user_type'] : "";
	$get_tree = (isset($_GET['get_tree']) && $_GET['get_tree'] != '') ? $_GET['get_tree'] : "";
	$bodyclass = "hold-transition";
	
	if (($_SESSION['userName']=="")) {
		$return_url = $dispatch;		
		$dispatch = "auth.login_form";
		$bodyclass .= " login-page";
	} else {
		$bodyclass .= " skin-blue sidebar-mini";
	}
	
	if($dispatch == "auth.recover_password") { 
		$return_url = $dispatch;		
		$dispatch = "auth.recover_password";
	}
	
	if ($dispatch=="auth.logout") {
		$_SESSION['userName'] = "";
		$_SESSION['userHistory'] = "";
		$dispatch = "auth.login_form";
		$return_url = "index.php";
	}
	
	$current_url = "http://".$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
	$history_max_url = 5; // change to the number of urls in the history array
	//Assign _SESSION array to variable, create one if empty ::: Thanks to Sold Out Activist for the explanation!
	$history = (array) $_SESSION['history'];
	//Add current url as the latest visit
	array_unshift($history, $current_url);
	//If history array is full, remove oldest entry
	if (count($history) > $history_max_url) {
		array_pop($history);
	}
	//update session variable
	$_SESSION['history'] = $history;	
	
	function getMetaTitle($content){
		$pattern = "|<[s]*title[s]*>([^<]+)<[s]*/[s]*title[s]*>|Ui";
		if(preg_match($pattern, $content, $match))
			return $match[1];
		else
			return false;
	}	
	
	function showHistory() {
	  $history = (array) $_SESSION['history'];
	  $i = 0;
	  while($i<count($history)) {
		  echo "<li><a href=". $history[$i] ." title='". $history[$i] ."'>" . $history[$i] . "</a></li>";
		  $i++;
	  }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrator Panel</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Theme style -->
	<link rel="stylesheet" href="./dist/css/AdminLTE.css">
	
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="./plugins/timepicker/bootstrap-timepicker.min.css">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
  
<body class="<?php echo $bodyclass; ?>">
	<div class="wrapper">
    <?php
		if($dispatch == "auth.login_form") { include "./pages/login.php";  }
		if($dispatch == "auth.recover_password") { include "./pages/recover-password.php"; }
		if($dispatch == "auth.logout") { include "./pages/logout.php"; }
		if($dispatch == "") {  include "./pages/dashboard.php";  }
		
		if($dispatch == "profile") { include "./pages/profile.php"; }
		if($dispatch == "calendar") { include "./pages/calendar.php"; }
		
		if($dispatch == "logs") { include "./pages/logs.php"; }
		
		
		/* About Us */
		if($dispatch == "category") { include "./pages/category.php"; }
		if($dispatch == "category.update") { include "./pages/category-update.php"; }
		if($dispatch == "category.add") { include "./pages/category-add.php"; }
		if($dispatch == "category.delete") { include "./pages/category-delete.php"; }
		
		if($dispatch == "post") { include "./pages/post.php"; }
		if($dispatch == "post.update") { include "./pages/post-update.php"; }
		if($dispatch == "post.add") { include "./pages/post-add.php"; }
		if($dispatch == "post.delete") { include "./pages/post-delete.php"; }
		
		/* Stay */
		if($dispatch == "stay") { include "./pages/stay.php"; }
		if($dispatch == "stay.update") { include "./pages/stay-update.php"; }
		if($dispatch == "stay.add") { include "./pages/stay-add.php"; }
		if($dispatch == "stay.delete") { include "./pages/stay-delete.php"; }
		
		/* Dine */
		if($dispatch == "dine") { include "./pages/dine.php"; }
		if($dispatch == "dine.update") { include "./pages/dine-update.php"; }
		if($dispatch == "dine.add") { include "./pages/dine-add.php"; }
		if($dispatch == "dine.delete") { include "./pages/dine-delete.php"; }

		/* Weddings */
		if($dispatch == "weddings") { include "./pages/weddings.php"; }
		if($dispatch == "weddings.update") { include "./pages/weddings-update.php"; }
		if($dispatch == "weddings.add") { include "./pages/weddings-add.php"; }
		if($dispatch == "weddings.delete") { include "./pages/weddings-delete.php"; }
		
		/* Banquets */
		if($dispatch == "banquets") { include "./pages/banquets.php"; }
		if($dispatch == "banquets.update") { include "./pages/banquets-update.php"; }
		if($dispatch == "banquets.add") { include "./pages/banquets-add.php"; }
		if($dispatch == "banquets.delete") { include "./pages/banquets-delete.php"; }
		
		/* Events */
		if($dispatch == "events") { include "./pages/events.php"; }
		if($dispatch == "events.update") { include "./pages/events-update.php"; }
		if($dispatch == "events.add") { include "./pages/events-add.php"; }
		if($dispatch == "events.delete") { include "./pages/events-delete.php"; }

		/* Agra */
		if($dispatch == "agra") { include "./pages/agra.php"; }
		if($dispatch == "agra.update") { include "./pages/agra-update.php"; }
		if($dispatch == "agra.add") { include "./pages/agra-add.php"; }
		if($dispatch == "agra.delete") { include "./pages/agra-delete.php"; }

		/* Offers */
		if($dispatch == "offers") { include "./pages/offers.php"; }
		if($dispatch == "offers.update") { include "./pages/offers-update.php"; }
		if($dispatch == "offers.add") { include "./pages/offers-add.php"; }
		if($dispatch == "offers.delete") { include "./pages/offers-delete.php"; }

		/* Gallery */
		if($dispatch == "gallery") { include "./pages/gallery.php"; }
		if($dispatch == "gallery.update") { include "./pages/gallery-update.php"; }
		if($dispatch == "gallery.add") { include "./pages/gallery-add.php"; }
		if($dispatch == "gallery.delete") { include "./pages/gallery-delete.php"; }

		/* Experience */
		if($dispatch == "experience") { include "./pages/experience.php"; }
		if($dispatch == "experience.update") { include "./pages/experience-update.php"; }
		if($dispatch == "experience.add") { include "./pages/experience-add.php"; }
		if($dispatch == "experience.delete") { include "./pages/experience-delete.php"; }

		/* Team */
		if($dispatch == "team") { include "./pages/team.php"; }
		if($dispatch == "team.update") { include "./pages/team-update.php"; }
		if($dispatch == "team.add") { include "./pages/team-add.php"; }
		if($dispatch == "team.delete") { include "./pages/team-delete.php"; }

		/* Awards */
		if($dispatch == "awards") { include "./pages/awards.php"; }
		if($dispatch == "awards.update") { include "./pages/awards-update.php"; }
		if($dispatch == "awards.add") { include "./pages/awards-add.php"; }
		if($dispatch == "awards.delete") { include "./pages/awards-delete.php"; }

		/* One Stop Shop Business Events */
		if($dispatch == "onestopshopbusinessevents") { include "./pages/onestopshopbusinessevents.php"; }
		if($dispatch == "onestopshopbusinessevents.update") { include "./pages/onestopshopbusinessevents-update.php"; }
		if($dispatch == "onestopshopbusinessevents.add") { include "./pages/onestopshopbusinessevents-add.php"; }
		if($dispatch == "onestopshopbusinessevents.delete") { include "./pages/onestopshopbusinessevents-delete.php"; }

		/* Reviews */
		if($dispatch == "reviews") { include "./pages/reviews.php"; }
		if($dispatch == "reviews.update") { include "./pages/reviews-update.php"; }
		if($dispatch == "reviews.add") { include "./pages/reviews-add.php"; }
		if($dispatch == "reviews.delete") { include "./pages/reviews-delete.php"; }

		if($dispatch == "termsnconditions") { include "./pages/termsnconditions.php"; }
		if($dispatch == "termsnconditions.update") { include "./pages/termsnconditions-update.php"; }
		
		if($dispatch == "privacy") { include "./pages/privacy.php"; }
		if($dispatch == "privacy.update") { include "./pages/privacy-update.php"; }

		if($dispatch == "socialmedia") { include "./pages/socialmedia.php"; }
		if($dispatch == "socialmedia.update") { include "./pages/socialmedia-update.php"; }

		if($dispatch == "emails") { include "./pages/emails.php"; }
		
		/* Contact */
		if($dispatch == "contact") { include "./pages/contact.php"; }
		
		if($dispatch == "newsletter") { include "./pages/newsletter.php"; }
		if($dispatch == "newsletter.add") { include "./pages/newsletter-add.php"; }
		if($dispatch == "newsletter.update") { include "./pages/newsletter-update.php"; } 
		if($dispatch == "newsletter.delete") { include "./pages/newsletter-delete.php"; } 
		
		if($dispatch == "explore") { include "./pages/explore.php"; }
		
		if($dispatch == "careers") { include "./pages/careers.php"; }
		if($dispatch == "careers.update") { include "./pages/careers-update.php"; }
		if($dispatch == "careers.add") { include "./pages/careers-add.php"; }
		if($dispatch == "careers.delete") { include "./pages/careers-delete.php"; }
		
		if($dispatch == "thingstodo") { include "./pages/thingstodo.php"; }
		if($dispatch == "thingstodo.add") { include "./pages/thingstodo-add.php"; }
		if($dispatch == "thingstodo.update") { include "./pages/thingstodo-update.php"; }
		if($dispatch == "thingstodo.delete") { include "./pages/thingstodo-delete.php"; }
		
		if($dispatch == "banners") { include "./pages/banners.php"; }
		if($dispatch == "banners.add") { include "./pages/banners-add.php"; }
		if($dispatch == "banners.update") { include "./pages/banners-update.php"; }	 
		if($dispatch == "banners.delete") { include "./pages/banners-delete.php"; }
		
		if($dispatch == "popup") { include "./pages/popup.php"; }
		if($dispatch == "popup.add") { include "./pages/popup-add.php"; }
		if($dispatch == "popup.update") { include "./pages/popup-update.php"; }	 
		if($dispatch == "popup.delete") { include "./pages/popup-delete.php"; }
		
		
		if($dispatch == "news") { include "./pages/news.php"; }
		if($dispatch == "news.add") { include "./pages/news-add.php"; }
		if($dispatch == "news.update") { include "./pages/news-update.php"; }
		
		if($dispatch == "pages") { include "./pages/pages.php"; }
		if($dispatch == "pages.update") { include "./pages/pages-update.php"; }
		if($dispatch == "pages.add") { include "./pages/pages-add.php"; }
		if($dispatch == "pages.delete") { include "./pages/pages-delete.php"; }

		if($dispatch == "comment") { include "./pages/comment.php"; }
		if($dispatch == "comment.update") { include "./pages/comment-update.php"; }
		if($dispatch == "comment.delete") { include "./pages/comment-delete.php"; }
		
		if($dispatch == "testimonial") { include "./pages/testimonial.php"; }
		if($dispatch == "testimonial.update") { include "./pages/testimonial-update.php"; }
		if($dispatch == "testimonial.add") { include "./pages/testimonial-add.php"; }
		if($dispatch == "testimonial.delete") { include "./pages/testimonial-delete.php"; }
		
		if($dispatch == "more.update") { include "./pages/more-update.php"; }
		if($dispatch == "more.add") { include "./pages/more-add.php"; }
		
		if($dispatch == "sitemap") { include "./pages/sitemap.php"; }
    ?>
	</div><!-- ./wrapper -->
	
	<!-- jQuery 2.1.4 -->
	<script src="./plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	<!-- Bootstrap 3.3.5 -->
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="./plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
		$(function () {
			$("#table1").DataTable();
			$('#table2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"columnDefs": [ {
					"targets": 'no-sort',
					"ordering": false
				} ]		
			});
		});
		
		function printPage() { 
			window.print(); 
		}
    </script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
	
	<script src="./plugins/daterangepicker/daterangepicker.js"></script>
	<script src="./plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- CK Editor -->
	<script src="./plugins/ckeditor/ckeditor.js"></script>
    <script src="./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
     	$(function () {
			CKEDITOR.replace('ckeditor');
       	 	$(".textarea").wysihtml5();
      	});
    </script>
</body>
</html>
