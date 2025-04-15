<?php include("inc/header.php");?>
	<!-- <amp-carousel id="carousel-with-preview" width="450" height="100" layout="responsive" type="slides" controls autoplay delay="3000">
		<?php
			$bannerResults = $mysqli->query("SELECT `id`,Pic,Title FROM `Banners` WHERE 1 AND `Status`='Active' AND BannerType='Home'");
				if ($bannerResults->num_rows) {
				while ($bannerRow = $bannerResults->fetch_array()) {
			?>
		<div class="slide">
			<img src="admin/assets/img/banners/<?php echo $bannerRow['Pic'];?>" class="banner-img">
			<div class="caption"><h1 class="h2 col-12 center"><?php echo $bannerRow['Title'];?></h1> </div>
		</div>
		<?php } } ?>
	</amp-carousel>
	<style>.slide img.banner-img {width: 100%;}@media screen and (max-width: 767px){h1.h2.col-12.center {font-size: 16px;}} </style> -->
	
		<main id="content" role="main" class="main md-flex flex-wrap items-start">
			<section class="commerce-blog-wrapper col-12 md-col-8 px2 pt2 pb3 md-px4 md-pt1 md-pb3">
				<h2 class="xs-hide sm-hide md-commerce-header h3 md-py2 md-mb4 mx2">featured posts</h2>
				<div class="md-flex flex-wrap">
				<?php
				$category_id='';
				if(!empty($_GET['id'])){
					$getsearchTitle = str_replace("-"," ",strtolower($_GET['id']));
					$searchType=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',p.tags)" : '';					$urlslug = strtolower($_GET['id']);
					$searchType22=(!empty($_GET['id'])) ? " AND p.urlslug='$urlslug'" : '';					$searchType2=(!empty($_GET['id'])) ? " AND urlslug='$urlslug'" : '';
					$getResults = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`image`,`Status`,`post_date` FROM `post` WHERE 1 AND `Status`='Active'$searchType2");
					$getRow = $getResults->fetch_array();
					$cat_id=$getRow[0]['category_id'];
					$category_id="AND id='$cat_id'";
				}if(!empty($_GET['tags'])){
					$getsearchTitle = str_replace("-"," ",strtolower($_GET['tags']));
					$searchType=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',p.tags)" : '';
					$searchTypeCategory=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',tags)" : '';
					$getResults = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`image`,`Status`,`post_date` FROM `post` WHERE 1 AND `Status`='Active'$searchTypeCategory");
					$getRow = $getResults->fetch_array();
					$cat_id=$getRow[0]['category_id'];
					$category_id="AND id='$cat_id'";
				}if(!empty($_GET['cid'])){
					$getsearchTitle = str_replace("-"," ",strtolower($_GET['cid']));
					$searchCType=(!empty($_GET['cid'])) ? " AND title='$getsearchTitle'" : '';
					$getResults = $mysqli->query("SELECT `id` FROM `category` WHERE 1 AND `Status`='Active'$searchCType");
					$getRow = $getResults->fetch_array();
					$cat_id=$getRow[0]['id'];
					$category_id="AND id='$cat_id'";
					$searchType=" AND p.category_id='$cat_id'";
				}
				$searchType=(!empty($searchType22)) ? $searchType22 : $searchType;
				$results = $mysqli->query("SELECT p.id,p.video_show, p.title, p.description,p.urlslug, p.tags, p.category_id, c.title as category_name,p.image, p.Status, p.post_date FROM `post` as p,category as c WHERE 1 AND c.id=p.category_id AND p.Status='Active'$searchType ORDER BY p.id DESC");				
				if ($results->num_rows) {
				while ($row = $results->fetch_array()) {
					$category_url = str_replace(" ","-",strtolower($row['category_name']));
				?>
				<article class="md-col-6 px2 slider-img">
				
<?php if(empty($row['video_show'])){
$post_id=$row['id'];
$postresults = $mysqli->query("SELECT * FROM `more_tbl` WHERE 1 AND post_id='$post_id'");
	?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			  <div class="item active">
			    <img src="./admin/assets/img/post/<?php echo $row['image'];?>" alt="<?php echo $row['image'];?>">
			  </div>
			<?php while($postrow = $postresults->fetch_assoc()){?>
			<div class="item">
			    <img src="./admin/assets/img/post/<?php echo $postrow['image'];?>" alt="<?php echo $postrow['image'];?>">
			  </div>
			<?php }?>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
		<?php }else{ ?>
		<iframe width="387" height="186" src="https://www.youtube.com/embed/<?php echo trim($row['video_show']);?>?autoplay=1&loop=1&playlist=<?php echo trim($row['video_show']);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<?php } ?>
			<!--<amp-img class="mb3" src="./admin/assets/img/post/<?php echo $row['image'];?>" srcset="./admin/assets/img/post/<?php echo $row['image'];?> 750w,./admin/assets/img/post/<?php echo $row['image'];?> 1280w" width="750" height="427" layout="responsive" alt="No sleep &#39;til Brooklyn" noloading="">
			<div placeholder="" class="commerce-loader"></div>  </amp-img> -->			
			<div class="mb3 md-mx0">
				<a class="text-decoration-none" href="<?php echo $row['urlslug'];?>.html">
					<h2 class="h3"><?php echo ucwords($row['title']);?></h2>
				</a>
				<time datetime="2017-03-31T00:00" class="inline-block mb2">
				<?php 
				$originalDate = $row['post_date'];
				echo $newDate = date("dS-M-Y", strtotime($originalDate));?></time>
			  <strong>- <a href="category-<?php echo $category_url;?>.html"><i><?php echo ucwords($row['category_name']);?></i></a></strong>
				<p class="mb2"><?php echo substr(strip_tags($row['description']),0,220);?></p>
				<a href="<?php echo $row['urlslug'];?>.html" class="commerce-blog-link inline-block h7 md-mb4">read more</a>
			</div>
		</article>
		<?php } } ?>
		</div>
	</section>
	<?php include("inc/sidebar.php");?>
</main>

<?php include("inc/footer.php");?>