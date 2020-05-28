<?php include('common/header.php'); ?>
<?php
	$id=(int)$_GET['userid'];
	$result=get_user_by_id($id);
	// _t($result);
?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><?php echo $result['allData']['fname']; ?></li>
		</ul>
	</div>
</div>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading"><?php echo $result['allData']['fname']; ?></div>
						<div class="panel-body thread-container">
							<table class="table table-bordered">
								<tr>
									<th>Full Name</th>
									<td><?php echo $result['allData']['fname']; ?></td>
								</tr>
								<tr>
									<th>Username</th>
									<td><?php echo $result['allData']['username']; ?></td>
								</tr>
								<tr>
									<th>Email</th>
									<td><?php echo $result['allData']['email']; ?></td>
								</tr>
								<tr>
									<th>Address</th>
									<td><?php echo $result['allData']['address']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>