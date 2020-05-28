<?php include('common/header.php'); ?>
<?php
	$title=$_GET['title'];
	$id=(int)$_GET['topicid'];
	$result=get_thread_by_topic($id);
	// _t($result);
?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ul>
	</div>
</div>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading"><?php echo $title; ?>
							<?php if(isset($_SESSION['userData'])){ ?>
							<span>
								<a href="add-thread.php?topicid=<?php echo $id; ?>&title=<?php echo $title; ?>" class="white-text pull-right">Add Thread <i class="fa fa-long-arrow-right"></i></a>
							</span>
							<?php } ?>
						</div>
						<div class="panel-body thread-container">
							<table class="table table-bordered table-striped">
								<tr class="warning">
									<th>Thread Title</th>
									<th>Posts</th>
									<th>Views</th>
									<th>Created By</th>
								</tr>
								<?php
									if($result['totalResult']>0){
										foreach($result['allData'] as $data){
											$userData=get_user_by_id($data['added_by']);
											// _t($userData);
											?>
											<tr>
												<td><a href="posts.php?threadid=<?php echo $data['thread_id']; ?>&title=<?php echo $data['title']; ?>&topictitle=<?php echo $title; ?>&topicid=<?php echo $id; ?>"><?php echo $data['title']; ?></a></td>
												<td class="text-inverse"><?php echo count_total_posts($data['thread_id'])['total']; ?></td>
												<td class="text-inverse"><?php echo count_total_thread_views($data['thread_id'])['views']; ?></td>
												<td>
													<table class="table">
														<tr>
															<td>
																<a href="user-detail.php?userid=<?php echo $userData['allData']['user_id']; ?>">
																	<img src="uploads/<?php echo $userData['allData']['img']; ?>" width="70" />
																	<p class="margin-top5"><?php echo $userData['allData']['fname']; ?></p>
																</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<?php
										}
										?>

										<?php
									}else{
										?>
										<tr>
											<td colspan="4"><?php echo _warning('No Data Found'); ?></td>
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