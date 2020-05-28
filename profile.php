<?php include('common/header.php'); ?>
<?php
	if(!isset($_SESSION['userData'])){
		header("location:login.php");
	}
?>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">User Profile</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<?php include('user-left-side.php'); ?>
								</div>
								<!-- Left User Sidebar -->
								<div class="col-md-9">
									<?php
										if(isset($_POST['userUpdate'])){
											$fname=$_POST['fname'];
											$user=$_POST['username'];
											$email=$_POST['email'];
											$address=$_POST['address'];
											// Add Data in table
											$data=array();
											$data['fname']=$fname;
											$data['user']=$user;
											$data['email']=$email;
											$data['address']=$address;
											$result=update_user($_SESSION['userData']['user_id'],$data);
											if($result['bool']==true){
												echo _success($result['msg']);
											}else{
												echo _warning($result['msg']);
											}
										}
										$userData=get_user_by_id($_SESSION['userData']['user_id']);
									?>
									<form method="post" action="">
										<table class="table table-bordered">
											<tr>
												<th>Full Name</th>
												<td><input type="text" name="fname" class="form-control" value="<?php echo $userData['allData']['fname']; ?>" /></td>
											</tr>
											<tr>
												<th>Username</th>
												<td><input type="text" name="username" class="form-control" value="<?php echo $userData['allData']['username']; ?>" /></td>
											</tr>
											<tr>
												<th>Email</th>
												<td><input type="text" name="email" class="form-control" value="<?php echo $userData['allData']['email']; ?>" /></td>
											</tr>
											<tr>
												<th>Address</th>
												<td><textarea name="address" class="form-control"><?php echo $userData['allData']['address']; ?></textarea></td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="submit" class="btn btn-warning" value="Update" name="userUpdate" />
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>