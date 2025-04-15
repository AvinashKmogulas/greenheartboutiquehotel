<aside class="commerce-blog-sidebar commerce-side-panel md-col-4 md-px4 md-pt4 md-pb4">
			
	<!-- search -->
	<!-- <div class=" mx1 relative">
		<fieldset>
			<form method="post" action-xhr="./" id="search_form">
				<input name="search" type="text" placeholder="Search" id="search" style="padding: 10px;display: block;margin: auto;width:100%;">
				
				<a on="tap:search_form.submit"><svg width="32" height="32" class="icon icon-search absolute" viewBox="0 0 32 32" aria-hidden="true"
					style="top:30px;right:30px;cursor:pointer">
						<path
							d="M27 24.57l-5.647-5.648a8.895 8.895 0 0 0 1.522-4.984C22.875 9.01 18.867 5 13.938 5 9.01 5 5 9.01 5 13.938c0 4.929 4.01 8.938 8.938 8.938a8.887 8.887 0 0 0 4.984-1.522L24.568 27 27 24.57zm-13.062-4.445a6.194 6.194 0 0 1-6.188-6.188 6.195 6.195 0 0 1 6.188-6.188 6.195 6.195 0 0 1 6.188 6.188 6.195 6.195 0 0 1-6.188 6.188z" />
					</svg>	
				</a>
			</form>
		</fieldset>
	</div> -->

	<!-- recent posts -->
	<div class="mx1">
		<fieldset style="padding-top:0">
			<p class="h7 center" style="padding:8px;margin:0;background: #c5a880;color:#fff;">Recent Posts</p>
			<div id="posts">
				<?php
				$results2 = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`urlslug`,`image`,`Status`,`post_date` FROM `post` WHERE 1 AND `Status`='Active' ORDER BY id DESC LIMIT 5");
					if ($results2->num_rows) {
					while ($row2 = $results2->fetch_array()) {
						//$string = str_replace(" ","-",strtolower($row2['title']));
						$string2 = $row2['urlslug'];
				?>
				
					<a href="<?php echo $string2;?>.html" class="p2 text-decoration-none post-title block">
						<?php 	echo ucwords($row2['title']);?>
					</a>
				
				<?php } }?>
			</div>
		</fieldset>
	</div>
<?php
if ($commentResults->num_rows) {
?>
	<!-- recent comments -->
	<div class="mt3 mx1">
		<fieldset style="padding-top:0">
			<p class="h7 center" style="padding:8px;margin:0;background: #c5a880;color:#fff;">Recent Comments</p>
			<div id="comments">
				<?php
				$commentResults = $mysqli->query("SELECT `id`,`name`,`comment`,`Status` FROM `comments` WHERE 1 AND `status`='Active' ORDER BY id DESC LIMIT 10");
				while ($commentRow = $commentResults->fetch_array()) {
			?>
				<a href="#" class="center md-pb2 block"><?php echo ucwords($row2['name']);?></a>
			<?php } ?>
			</div>
		</fieldset>
	</div>
<?php }
	$results2 = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`urlslug`,`category_id`,`image`,`Status`,`post_date` FROM `post` WHERE 1 AND `Status`='Active' ORDER BY id DESC LIMIT 5,15");
		if ($results2->num_rows) {
?>
	<!-- Archives -->
	<div class="mt3 mx1">
		<fieldset style="padding-top:0">
			<p class="h7 center" style="padding:8px;margin:0;background: #c5a880;color:#fff;">Archives</p>
			<div id="archives">
				<?php
					while ($row2 = $results2->fetch_array()) {
						//$string = str_replace(" ","-",strtolower($row2['title']));	
						$string = $row2['urlslug'];
				?>
				<a href="<?php echo $string;?>.html" class="p2 text-decoration-none post-title block">
				<?php echo ucwords($row2['title']);?></a>
				<?php } ?>
			</div>	
		</fieldset>	
	</div>
<?php } 
	$cResults = $mysqli->query("SELECT `id`,`title`,`Status` FROM `category` WHERE 1 AND `Status`='Active'");
	/* if ($cResults->num_rows) {
?>
	<!-- Categories -->
	<div class="mt3 mx1">
		<fieldset style="padding-top:0">
			<p class="h7 center" style="padding:8px;margin:0 5%;background: #000;color:#fff;">Categories</p>
			<div class="mt3" id="categories">
			<?php
				while ($crow = $cResults->fetch_array()) {
					$cstring = str_replace(" ","-",strtolower($crow['title']));
			?>
				<a class="center md-pb2 block" href="category-<?php echo $cstring;?>.html"><?php echo ucwords($crow['title']);?></a>
				<?php }  ?>
			</div>
		</fieldset>
	
	</div>
<?php  }  */
$tResults = $mysqli->query("SELECT `id`,`tags`,`Status` FROM `post` WHERE 1 AND `Status`='Active'"); 
/* 	if ($tResults->num_rows) {
?>

	<!-- Tag Cloud -->
	<div class="my3 mx1">
		<fieldset style="padding-top:0">
			<p class="h7 center" style="padding:8px;margin:0 5%;background: #000;color:#fff;">Tag Cloud</p>
			<div class="mt3" id="tags">
			<?php
				// $tResults = $mysqli->query("SELECT `id`,`tags`,`Status` FROM `post` WHERE 1 AND `Status`='Active' $category_id");
				 

						$tags[0] = "";
						$i= 0;
				while ($trow = $tResults->fetch_array()) {

					$explodeData=explode(',',$trow['tags']);
					foreach($explodeData as $key=>$value){

						$count = sizeof($tags);
						
							$j=0;
							$t=true;
						while ($j < $count) {

								if ($tags[$j] == $value) {
									$t= false;
								}else{}
							$j++;
						}
							if ($t) {
								$tags[$i] = $value;
								$tstring = str_replace(" ","-",strtolower($tags[$i]));
							?>
								<a href="tags-<?php echo $tstring;?>.html" class="center tag-btn md-pb2 inline-block mb1"><?php
								echo ucwords($tags[$i]); ?></a>
						<?php
							$i++;
						}
				 }
			} 

		
	?>
				
			</div>
	
		</fieldset>
	
	</div>
	<?php } */ ?>
</aside>