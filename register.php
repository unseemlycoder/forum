<?php include('common/header.php'); ?>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_POST['addUser'])){
							$fname=$_POST['fname'];
							$user=$_POST['user'];
							$email=$_POST['email'];
							$pwd=$_POST['pwd'];
							$cpwd=$_POST['cpwd'];
							$address=$_POST['address'];
							if($pwd==$cpwd && (!empty($pwd) && !empty($user) && !empty($email))){
								// Add Data in table
								$data=array();
								$data['fname']=$fname;
								$data['user']=$user;
								$data['email']=$email;
								$data['pwd']=$pwd;
								$data['address']=$address;
								$result=register_user($data);
								if($result['bool']==true){
									echo _success($result['msg']);
								}else{
									echo _warning($result['msg']);
								}
							}else{
								echo _warning('Please enter required fields');
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">User Login</div>
						<div class="panel-body">
							<form action="" method="post">
							<table class="table table-bodered">
								<tr>
									<th>Full Name</th>
									<td><input type="text" class="form-control" name="fname" /></td>
								</tr>
								<tr>
									<th>Username <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="user" /></td>
								</tr>
								<tr>
									<th>Email <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="email" /></td>
								</tr>
								<tr>
									<th>Password <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="pwd" /></td>
								</tr>
								<tr>
									<th>Confirm Password <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="cpwd" /></td>
								</tr>
								<tr>
									<th>Address</th>
									<td><textarea class="form-control" name="address"></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="addUser" class="btn btn-warning" value="Register" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										If you are already member then you can <a href="login.php">login here</a>.
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