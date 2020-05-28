<?php include('common/header.php'); ?>
<!-- Content Start -->
<div class="row">
	<div class="col-md-3">
		<?php include('common/left-sidebar.php'); ?>
	</div>
	<div class="col-md-9">
		<div class="panel panel-danger">
			<div class="panel-heading">Stastistics</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">Total Topics</div>
							<div class="panel-body"><a href="topics.php" class="text-danger"><?php echo count_total_topics()['total']; ?></a></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">Total Threads</div>
							<div class="panel-body"><a href="threads.php" class="text-danger"><?php echo count_totalthreads()['total']; ?></a></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">Total Posts</div>
							<div class="panel-body"><a href="posts.php" class="text-danger"><?php echo count_totalposts()['total']; ?></a></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">Total Users</div>
							<div class="panel-body"><a href="users.php" class="text-danger"><?php echo count_totalusers()['total']; ?></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content End -->
<?php include('common/footer.php'); ?>