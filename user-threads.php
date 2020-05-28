<?php include('common/header.php'); ?>
<?php
	$result=get_threads_by_user($_SESSION['userData']['user_id']);
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
									<table class="table table-bordered table-striped">
										<tr class="warning">
											<th>Topic</th>
											<th>Thread</th>
											<th>Posted</th>
										</tr>
										<?php
										if($result['bool']==true){
											foreach($result['allData'] as $data){
												$topicDetail=get_topic_by_id($data['topic_id']);
												// _t($topicDetail);
											?>
											<tr>
												<td><?php echo $topicDetail['allData']['title']; ?></td>
												<td><?php echo $data['title']; ?></td>
												<td><?php echo $data['add_time']; ?></td>
											</tr>
											<?php
										}
										}else{
											?>
											<tr>
												<td colspan="3">No Data Found!!</td>
											</tr>
											<?php
										}
										?>
										<tr>
											<th>Topic</th>
											<th>Thread</th>
											<th>Posted</th>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>