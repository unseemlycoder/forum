<?php require('../common/functions.php'); ?>
<?php if(!isset($_SESSION['admin'])){header("location:login.php");} ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
	<!-- Bootstrap 3 -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/yeti-bootstrap.min.css" />
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/css/style.css" />
	<title>Admin - AcademicoForo</title>
</head>
<body>
	<div class="container">
		<!-- Header Row -->
		<div class="row">
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
				      <a class="navbar-brand" href="index.php">Admin</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav navbar-right">
				      	<li><a href="<?php echo $path['siteUrl']; ?>" target="_blank">Front View</a></li>
				        <li><a href="logout.php">Logout</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
		</div>
		<!-- Header End -->