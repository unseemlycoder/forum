<?php include('common/header.php'); ?>
<?php
	$result=get_posts();
	// _t($result);
?>
<!-- Content Start -->
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<?php include('common/left-sidebar.php'); ?>
	</div>
	<div class="col-md-9">
		<?php
		if(isset($_SESSION['flashMsg'])){
			echo _warning($_SESSION['flashMsg']);
			unset($_SESSION['flashMsg']);
		}
		?>
		<div class="panel panel-danger">
			<div class="panel-heading">Topics <span class="badge"><?php echo $result['totalResult']; ?></span> </div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Thread</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created By</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
					<?php
						if($result['totalResult']>0){
							foreach($result['allData'] as $data){
								$userDetail=get_user_by_id($data['added_by']);
								$threadDetail=get_thread_by_id($data['post_id']);
								// _t($threadDetail);
								if($threadDetail['totalResult']>0){
									$threadTitle=$threadDetail['allData']['title'];
								}else{
									$threadTitle='No Post';
								}
								?>
								<tr>
									<td><?php echo $threadTitle; ?></td>
									<th><?php echo $data['title']; ?></th>
									<td><?php echo $data['description']; ?></td>
									<td><?php echo $userDetail['allData']['fname']; ?></td>
									<td><?php echo $data['add_time']; ?></td>
									<td>
										<span>
											<a href="delete-post.php?postid=<?php echo $data['post_id']; ?>&title=<?php echo $data['title']; ?>" class="text-danger" onclick="return confirm('Are you sure to delete this?')"><i class="fa fa-times"></i></a>
										</span>
									</td>
								</tr>
								<?php
							}
						}else{
							?>
							<tr>
								<td colspan="4">
									<?php echo _warning('No Data Found'); ?>
								</td>
							</tr>
							<?php
						}
					?>
					
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Content End -->
<?php include('common/footer.php'); ?>