<?php require('common/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>AcademicoForo</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/flatly-bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/css/style.css" />
</head>
<body style="background-image: url(<?php echo $path['siteUrl']; ?>/img/bg2.jpg);">
	<div class="container-fluid">
		<div class="container">
			<div class="row header-row margin-bottom10">
				<div class="col-md-12">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="aboutus.php"><i class="fa fa-comments"></i>&nbsp;AcademicoForo</a>
					    </div> <!-- href="<?php echo $path['siteUrl']; ?>" -->

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="index.php">Home</a></li>
					        <?php
					        	if(isset($_SESSION['userData'])){
					        		?>
					        		<li class="dropdown">
								  
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
							          <ul class="dropdown-menu">
							            <li><a href="profile.php">My Profile</a></li>
							            <li role="separator" class="divider"></li>
							            <li><a href="logout.php">logout</a></li>
							          </ul>
							        </li>

								
								

					        		<?php
					        	}else{
					        		?>
					        		<li><a href="register.php">Join Now</a></li>
					        		<li><a href="login.php">Login</a></li>
					        		<?php
					        	}
					        ?>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
			<!-- Header End -->