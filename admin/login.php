<?php require('../common/functions.php'); ?>
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
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h3 class="page-header">AcademicoForo</h3>
				<?php
				if(isset($_POST['login'])){
					$data=array();
					$data['username']=$_POST['user'];
					$data['pwd']=$_POST['pwd'];
					$res=admin_login($data);
					if($res['bool']==true){
						$_SESSION['admin']=true;
						header("location:index.php");
					}else{
						echo _warning('Invalid Login!!');
					}
				}
				?>
				<div class="panel panel-primary">
					<div class="panel-heading">Admin Login</div>
					<div class="panel-body">
						<form method="post" action="">
							<table class="table table-bordered">
								<tr>
									<th>Username</th>
									<td><input type="text" name="user" class="form-control" /></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><input type="Password" name="pwd" class="form-control" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="login" class="btn btn-danger btn-block" value="Login" /></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
