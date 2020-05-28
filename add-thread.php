<?php include('common/header.php'); ?>
<?php
	$title=$_GET['title'];
	$id=(int)$_GET['topicid'];
?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php">Topics</a></li>
			<li><a href="threads.php?topicid=<?php echo $id; ?>&title=<?php echo $title; ?>">Threads</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ul>
	</div>
</div>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<?php
						// Add Thread
						if(isset($_POST['addThread'])){
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
								$res=add_thread($id,$data);
								if($res['bool']==true){
									echo _success($res['msg']);
								}else{
									echo _error($res['msg']);
								}
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">Add Thread in "<?php echo $title; ?>"
							<span>
								<a href="threads.php?topicid=<?php echo $id; ?>&title=<?php echo $title; ?>" class="white-text pull-right"><i class="fa fa-long-arrow-left"></i> Topic List</a>
							</span>
						</div>
						<div class="panel-body thread-container">
							<form action="" method="post">
								<table class="table table-bordered">
									<tr>
										<th>Title <i class="fa fa-asterisk text-danger"></i></th>
										<td><input type="text" class="form-control" name="title" /></td>
									</tr>
									<tr>
										<th>Description <i class="fa fa-asterisk text-danger"></i></th>
										<td><textarea class="form-control" name="description"></textarea></td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" class="btn btn-warning" value="Add Thread" name="addThread" />
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