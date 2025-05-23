
<header class="main-header">
	<!-- Logo -->
	<a href="./" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Admin Panel</b></span>
	</a>
	
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
		
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="dist/img/<?php echo $_SESSION['userPic'] ?>" class="user-image" alt="User Image"><span class="hidden-xs"><?php echo $_SESSION['userName'] ?></span></a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="dist/img/<?php echo $_SESSION['userPic'] ?>" class="img-circle" alt="User Image" />
							<p><?php echo $_SESSION['userName'] ?><small>Member since March 2016</small></p>
						</li>
						
						<!-- Menu Body -->
						<!--li class="user-body">
							<div class="col-xs-4 text-center"><a href="#">Followers</a></div>
							<div class="col-xs-4 text-center"><a href="#">Sales</a></div>
							<div class="col-xs-4 text-center"><a href="#">Friends</a></div>
						</li-->
						
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left"><a href="?dispatch=profile" id="btnProfile" class="btn btn-default btn-flat">Profile</a></div>
							<div class="pull-right"><a href="?dispatch=auth.logout" class="btn btn-default btn-flat">Sign out</a></div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
