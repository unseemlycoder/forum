<?php include('common/header.php'); ?>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_POST['loginUser'])){
							$username=$_POST['username'];
							$pwd=$_POST['pwd'];
							if(empty($username) || empty($pwd)){
								echo _warning('Enter required fields!!');
							}else{
								$data=array();
								$data['username']=$username;
								$data['pwd']=$pwd;
								$result=user_login($data);
								if($result['bool']==true){
									$_SESSION['userData']=$result['allData'];
									header("location:index.php");
								}else{
									echo _warning($result['msg']);
								}
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">User Login</div>
						<div class="panel-body">
							<form method="post" action="">
							<table class="table table-bodered">
								<tr>
									<th>Username <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" name="username" class="form-control" /></td>
								</tr>
								<tr>
									<th>Password <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" name="pwd" class="form-control" /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="loginUser" class="btn btn-warning" value="Login" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										If you are new here then you can <a href="register.php">register here</a>.
									</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>