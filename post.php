<?php include('common/header.php'); ?>
<?php
	$title=$_GET['title'];
	$id=(int)$_GET['postid'];
	$topicId=(int)$_GET['topicid'];
	$topicTitle=$_GET['topictitle'];
	$threadId=(int)$_GET['threadid'];
	$threadTitle=$_GET['threadtitle'];
	$result=get_replies_by_post($id);
	update_post_view($id);
?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="threads.php?topicid=<?php echo $topicId; ?>&title=<?php echo $topicTitle; ?>"><?php echo $topicTitle; ?></a></li>
			<li><a href="posts.php?topicid=<?php echo $topicId; ?>&topictitle=<?php echo $topicTitle; ?>&title=<?php echo $threadTitle; ?>&threadid=<?php echo $threadId; ?>">Posts</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ul>
	</div>
</div>
			<!-- Content Start -->
			<div class="row">
				<?php
						// Add Thread
						if(isset($_POST['addReply'])){
							$title=mysqli_escape_string($con,$_POST['title']);
							$description=mysqli_escape_string($con,$_POST['description']);
							if(empty($title) || empty($description)){
								echo _warning('Enter required fields!!');
							}else{
								$data=array();
								$data['id']=$id;
								$data['title']=$title;
								$data['description']=$description;
								$data['added_by']=$_SESSION['userData']['user_id'];
								$res=add_reply($id,$data);
								if($res['bool']==true){
									echo _success($res['msg']);
								}else{
									echo _error($res['msg']);
								}
							}
						}
						$result=get_replies_by_post($id);
					?>
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading"><?php echo $title; ?> <a href="#reply" style="color: #fff;" class="pull-right">Reply <i class="fa fa-arrow-down"></i></a></div>
						<div class="panel-body">
							<!-- Single Post Start -->
							<?php if($result['totalResult']>0){
								foreach($result['allData'] as $data){
									$userData=get_user_by_id($data['added_by']);
									?>
									<div class="row margin-bottom20 border-bottom">
										<div class="col-md-2">
											<div class="thumbnail">
										      <img src="uploads/<?php echo $userData['allData']['img']; ?>" class="img img-responsive" />
										      <div class="caption">
										        <h4><a href="user-detail.php?userid=<?php echo $userData['allData']['user_id']; ?>"><?php echo $userData['allData']['fname']; ?></a></h4>
										      </div>
										    </div>
										</div>
										<!-- User Panel #End -->
										<div class="col-md-10">
											<h4 class="margin-bottom10"><?php echo $data['title']; ?></h4>
											<p><?php echo $data['description']; ?></p>
											<p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $data['add_time']; ?></i></p>
										</div>
									</div>
									<?php
								}
								?>
								<?php
							}else{
								?>
								<div class="row margin-bottom20">
									<div class="col-md-12">
										<p class="alert alert-warning">No Replies Yet!!</p>
									</div>
								</div>
								<?php
							}
							?>
							<!-- Post Replies End -->		
						</div>
					</div>
				</div>
				<!-- Post Replies End -->
			</div>

			<!-- Add Reply -->
			<div class="row" id="reply">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Add Reply to "<?php echo $title; ?>"</div>
						<div class="panel-body">
							<?php if(isset($_SESSION['userData'])){ ?>
							<form action="" method="post">
								<table class="table table-bordered">
									<tr>
										<th>Subject</th>
										<td><input type="text" name="title" class="form-control" /></td>
									</tr>
									<tr>
										<th>Message</th>
										<td><textarea class="form-control" name="description"></textarea></td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" name="addReply" class="btn btn-warning" value="Add Reply" />
										</td>
									</tr>
								</table>
							</form>
							<?php } else{
								?>
								<p class="text-inverse">Please <a href="login.php">Login</a> to Reply</p>
								<?php
							}	
							?>
						</div>
					</div>
				</div>
				<!-- Post Replies End -->
			</div>

			<!-- Content End -->
<?php include('common/footer.php'); ?>