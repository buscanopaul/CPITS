<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CPI-TS</title>
		<!-- Bootstrap Core CSS -->
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
		<!-- Timeline CSS -->
    	<link href="dist/css/timeline.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="dist/css/sb-admin-2.css" rel="stylesheet">
		<!-- Morris Charts CSS -->
		<link href="bower_components/morrisjs/morris.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">CPI-TS</a>
			</div><!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
						<i class="fa fa-user fa-fw"></i>  <?php echo $user->data()->name; ?> &nbsp;<i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li>
							<a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul><!-- /.dropdown-user -->
				</li><!-- /.dropdown -->
			</ul><!-- /.navbar-top-links -->
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<form action="search.php" method="post" enctype="multipart/form-data" role="search">
							<li class="sidebar-search">
								<div class="input-group custom-search-form">
									<input type="text" class="form-control" name="search" id="search" value="<?php echo escape(Input::get('search')); ?>" placeholder="Search">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="fa fa-search"></i>
										</button>
									</span>
								</div><!-- /input-group -->
							</li>
						</form>
						<li>
							<a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						 <?php if($user->data()->group == 2) :?>
							<li>
								<a href="#"><i class="fa fa-edit fa-fw"></i> Request Form<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
	                                    <a href="checkin.php"> Check-in</a>
	                                </li>
	                                <li>
	                                    <a href="checkout.php"> Check-out</a>
	                                </li>
	                            </ul><!-- /.nav-second-level -->
	                        </li>
                        <?php endif; ?>
                        <?php if($user->data()->group == 1) :?>
	                        <li>
								<a href="checkinapp.php"><i class="fa fa-inbox"></i> Check-in</a>
							</li>
							<li>
								<a href="checkoutapp.php"><i class="fa fa-shopping-cart"></i> Check-out</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="#"><i class="fa fa-list"></i> History<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="checkinhis.php"> Check-in</a>
								</li>
								<li>
									<a href="checkouthis.php"> Check-out</a>
								</li>
							</ul><!-- /.nav-second-level -->
						</li>
						<?php if($user->data()->group == 1) :?>
							<li>
								<a href="#"><i class="fa fa-users"></i> Admin<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="register.php"> Register User</a>
									</li>
									<li>
										<a href="#"> Update User</a>
									</li>
								</ul><!-- /.nav-second-level -->
							</li>
						<?php endif; ?>
					</ul>
				</div><!-- /.sidebar-collapse -->
			</div><!-- /.navbar-static-side -->
		</nav>