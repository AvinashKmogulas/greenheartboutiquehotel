<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image"><img src="dist/img/<?php echo $_SESSION['userPic'] ?>" class="img-circle" alt="User Image"></div>
			<div class="pull-left info">
				<p><?php echo $_SESSION['userName'] ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<!-- search form -->
		<!--form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form-->

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			
			<li class="<?php if($dispatch == ""){ ?> active<?php } ?>"><a href="./"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			
			<li class="<?php if($dispatch == "banners"){ ?> active<?php } ?>"><a href="?dispatch=banners"><i class="fa fa-bullseye" aria-hidden="true"></i> <span>Banners</span></a></li>
			
			<li class="<?php if($dispatch == "category"){ ?> active<?php } ?>"><a href="?dispatch=category"><i class="fa fa-bullseye" aria-hidden="true"></i> <span>Category</span></a></li>

			<?php if($resultsS = $mysqli->query("SELECT * FROM `post`")) { $totalStay = $resultsS->num_rows; } ?>
			<li class="<?php if(($dispatch == "post")||($dispatch == "post.update")||($dispatch == "post.add")){ ?> active<?php } ?>"><a href="?dispatch=post"><i class="fa fa-bed"></i> <span>Post</span><small class="label pull-right bg-red"><?php echo $totalStay ?></small></a></li>
			
			<?php if($resultsS = $mysqli->query("SELECT * FROM `comments`")) { $totalStay = $resultsS->num_rows; } ?>
			<li class="<?php if(($dispatch == "comment")||($dispatch == "comment.update")||($dispatch == "comment.add")){ ?> active<?php } ?>"><a href="?dispatch=comment"><i class="fa fa-bed"></i> <span>Comment</span><small class="label pull-right bg-red"><?php echo $totalStay ?></small></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
