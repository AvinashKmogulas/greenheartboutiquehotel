<?php include("inc/header.php");?>
<?php
$blog_url=$_GET['blog_url'];
$results = $mysqli->query("SELECT p.id, p.title, p.video_show, p.description,p.urlslug, p.tags, p.category_id, c.title as category_name,p.image, p.Status, p.post_date FROM `post` as p,category as c WHERE 1 AND c.id=p.category_id AND p.Status='Active' AND p.urlslug='$blog_url'");
$row = $results->fetch_assoc();
$category_url = str_replace(" ","-",strtolower($row['category_name']));
?>
<style>
input.submit-btn {
    background: #8c7555;
    border: 0px;
    color: #fff !important;
    padding: 8px 30px;
    display: inline-block;
    font-size: 16px;
}
span.center-btn {
    text-align: CENTER;
    width: 100%;
    margin: AUTO;
    display: inline-block;
    padding-top: 10px;
}
.a-tag p a {
    color: #0072ff;
}
</style>
  <main id="content" role="main" class="main flex flex-wrap items-start">


    <article class="commerce-blog-wrapper col-12 md-col-8 px2 pt2 pb3 md-px4 md-pt6 md-pb7">
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
<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo trim($row['video_show']);?>?autoplay=1&loop=1&playlist=<?php echo trim($row['video_show']);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } ?>
      <!--<amp-img src="./admin/assets/img/post/<?php echo $row['image'];?>" srcset="./admin/assets/img/post/<?php echo $row['image'];?> 750w,./admin/assets/img/post/<?php echo $row['image'];?> 1280w" width="750" height="427" layout="responsive" alt="No sleep &#39;til Brooklyn" noloading="">
      <div placeholder="" class="commerce-loader"></div>      </amp-img>-->


      <div class="mt3">
        <h1 class="h3"><?php echo $row['title'];?></h1>
        <time datetime="2017-03-31T00:00" class="inline-block mb2"><?php 
						$originalDate = $row['post_date'];
						echo $newDate = date("dS-M-Y", strtotime($originalDate));?></time>
        <span><strong> - <a href="category-<?php echo $category_url;?>.html"><i><?php echo ucwords($row['category_name']);?></i></a></strong></span>
        <div class="mb5 a-tag">
		<?php 
/* echo preg_replace('/<img .*? src="([^"]*)" .*?>/','<amp-img src="$1" width="200" height="600" layout="intrinsic" alt="AMP"></amp-img>',$row['description']); */
//echo $content=$row['description'];
$content=$row['description'];
		$result = preg_replace('/(<img[^>]+>(?:<\/img>)?)/i', '$1</amp-img>', $content);
		echo $description=str_replace('<img', '<amp-img width="750" height="500"', $result);
/* $result = preg_replace('/(<img[^>]+>(?:<\/img>)?)/i', '$1</amp-img>', $content);
echo str_replace('<img', '<amp-img', $result); */
		?>
		</div>
      </div>
      <div>
        <!-- article keywords -->
        <h3 class="h7 inline-block mt1">tags:</h3>
        <p id="keywords" class="inline-block">
		<?php
		$explodeData=explode(',',$row['tags']);
		foreach($explodeData as $key=>$value){
		$tstring = str_replace(" ","-",strtolower($value));
		?>
			<a class="mr13" href="tags-<?php echo $tstring;?>.html"><?php echo ucwords($value); ?></a>,  
		<?php } ?>
        </p>

        <!-- comment section -->
        <div class="comments mt4">
          <p class="p2 border border-grey">
            <amp-img src="./img/comment-icon.png" width="20" height="20" alt="comment icon"></amp-img>
            <span class="inline-block pl2">
              Comments
            </span>
          </p>
		  <?php
				$post_id=$row['id'];
				$commentResults = $mysqli->query("SELECT * FROM `comments` WHERE status='Active' AND post_id='$post_id'");
				if ($commentResults->num_rows) {
				while($crow = $commentResults->fetch_assoc()){
			?>
          <div class="border-left border-right border-bottom border-grey px2 py3">
            <div class="p3 author border border-grey mt3 flex flex-wrap items-start" id="author">
              <div class="inline">
                <svg class="p1 border circle border-grey" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" version="1.1" width="60px" height="60px">
                  <g id="surface1">
                    <path style="fill:#aaa;"
                      d="M 13 0.15625 C 9.824219 0.15625 7.09375 2.296875 7.09375 6.40625 C 7.09375 9.089844 8.351563 11.816406 10 13.5 C 10.265625 14.199219 10.21875 14.722656 10.0625 15.09375 C 10.277344 15.382813 11.113281 16.226563 12.5 16.40625 C 11.988281 16.984375 11.320313 18.179688 10.78125 19.375 C 9.742188 17.902344 9 16 9 16 C 5.730469 17.21875 2.03125 19.359375 2.03125 21.46875 L 2.03125 22.28125 C 2.03125 25.226563 7.742188 25.875 13.03125 25.875 C 18.328125 25.875 23.96875 25.226563 23.96875 22.28125 L 23.96875 21.46875 C 23.96875 19.328125 20.34375 17.214844 16.96875 16.03125 C 16.96875 16.03125 16.25 17.914063 15.21875 19.375 C 14.679688 18.175781 14.015625 16.984375 13.5 16.40625 C 14.835938 16.242188 15.648438 15.457031 15.90625 15.125 C 15.796875 14.761719 15.78125 14.257813 16.03125 13.5 C 17.667969 11.8125 18.90625 9.078125 18.90625 6.40625 C 18.90625 2.300781 16.175781 0.15625 13 0.15625 Z " />
                  </g>
                </svg>
              </div>
			  
              <div class="inline-block md-pl4">
                <h3 class="inline-block h6">Commented By <?php echo $crow['name'];?></h3>
                <time datetime="2017-03-31T00:00" class="inline-block mb1"> - <?php 
						$originalDate = $crow['post_date'];
						echo $newDate = date("dS-M-Y", strtotime($originalDate));?></time>
                <p class="block"><?php echo $crow['comment'];?></p>
                <!--<a href="#" class="ampstart-btn mt2" id="reply">Reply</a>-->
              </div>
			
            </div>
          </div>
		  <?php }
				}
			?>
          <div class="comments-form border-left border-right border-bottom border-grey p4">
            <h4 class="h3">Leave a Reply</h4>
            <p class="mb2">Your email address will not be published.</p>
            <form method="POST" action-xhr="https://mogulsqueries.com/blogsite/test.php"
              custom-validation-reporting="show-all-on-submit">
			  <input type="hidden" name="post_id" value="<?php echo $row['id'];?>"/>
              <input class="px2 py1 m1 ml-auto col-12" type="text" name="name" id="show-all-on-submit-name" placeholder="Name"
              required
              pattern="\p{L}+\s\p{L}+">

                <span visible-when-invalid="valueMissing"
                  validation-for="show-all-on-submit-name"></span>
                <span visible-when-invalid="patternMismatch"
                  validation-for="show-all-on-submit-name">
                  Enter First and last name seperated by space
                </span>

              <input class="px2 py1 m1 ml-auto col-12" type="email" name="email" 
              placeholder="Email" required
              id="show-all-on-submit-email"
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <span visible-when-invalid="valueMissing"
                  validation-for="show-all-on-submit-email"></span>
                <span visible-when-invalid="typeMismatch"
                  validation-for="show-all-on-submit-email">
                </span>
                <span visible-when-invalid="patternMismatch"
                validation-for="show-all-on-submit-email">Invalid Email</span>

              <textarea class="p2 mt1" name="comment" id="show-all-on-submit-comment" cols="58" rows="10" 
              style="resize:none;width:100%" placeholder="Comment" required></textarea>
              <span visible-when-invalid="valueMissing"
                  validation-for="show-all-on-submit-comment"></span>
              <span class="center-btn">
              <input type="submit" value="Submit" class="submit-btn"></span>
              <div submit-success>
                <template type="amp-mustache">
                  <h4 class="text-success">Comment Saved!</h4>
                  <!-- <code>amp-form</code> demo! Try to insert the word "error" as a name input in the form to see how
                  <code>amp-form</code> handles errors. 
                -->
                </template>
              </div>
              <div submit-error>
                <template type="amp-mustache">
                  Error!
                </template>
              </div>
            </form>
          </div>
          
        </div>

        <!-- related news -->
        <div class="mt3 py3 flex flex-wrap items-start">
          
          <div class="col-12 pb3">
            <h3 class="h3">Related Posts</h3>
          </div>
          <?php
          $category_id=$row['category_id'];
          $catResults = $mysqli->query("SELECT p.id, p.title, p.description,p.urlslug, p.tags, p.category_id, c.title as category_name,p.image, p.Status, p.post_date FROM `post` as p,category as c WHERE 1 AND c.id=p.category_id AND p.Status='Active' AND p.category_id='$category_id'");
          while($catRow = $catResults->fetch_assoc()){
          ?>
          <div class="col-12 md-col-4 pr2">
            <a href="<?php echo $catRow['urlslug'];?>.html">
              <amp-img class="mb1" src="./admin/assets/img/post/<?php echo $catRow['image'];?>" srcset="./admin/assets/img/post/<?php echo $catRow['image'];?> 750w,./admin/assets/img/post/<?php echo $catRow['image'];?> 1280w" width="750" height="427" layout="responsive" alt="No sleep &#39;til Brooklyn" noloading="">
                <div placeholder="" class="commerce-loader"></div>      
              </amp-img>

              <h4 class="h7 mb2"><?php echo $catRow['title'];?></h4>
            </a>
          </div>
		      <?php } ?>
        </div>

      </div>
      <a href="blog-list.php" class="ampstart-btn ampstart-btn-secondary inline-block h7 pt3 mt4 md-mb4">Back to Blog</a>
    </article>

<?php include("inc/sidebar.php");?>
  </main>
<?php include("inc/footer.php");?>
