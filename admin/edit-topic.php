<?php include('common/header.php'); ?>
<?php
	$currentTitle=$_GET['title'];
	$id=$_GET['topicid'];
	$result=get_topic_by_id($id);
?>
<!-- Content Start -->
<div class="row">
	<ul class="breadcrumb">
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="topics.php">Topics</a></li>
		<li class="active"><?php echo $currentTitle; ?></li>
	</ul>
</div>

<div class="row">
	<?php
		if(isset($_POST['submit'])){
			$data=array();
			$data['title']=mysqli_escape_string($con,$_POST['topic_title']);
			$data['description']=mysqli_escape_string($con,$_POST['topic_desc']);
			$addRes=update_topic($id,$data);
			if($addRes['bool']==true){
				echo _success($addRes['msg']);
			}else{
				echo _warning($addRes['msg']);
			}
		}
		$result=get_topic_by_id($id);
	?>
	<div class="panel panel-danger">
		<div class="panel-heading">Edit Topic <a href="topics.php" class="pull-right white-text"><i class="fa fa-long-arrow-left"></i> Topic List</a></div>
		<div class="panel-body">
			<form action="" method="post">
			<table class="table table-bordered table-striped">
				<?php
					if($result['totalResult']>0){
						?>
						<tr>
							<th>Title</th>
							<td><input type="text" class="form-control" name="topic_title" value="<?php echo $result['allData']['title']; ?>" /></td>
						</tr>
						<tr>
							<th>Description</th>
							<td><textarea class="form-control" name="topic_desc"><?php echo $result['allData']['description']; ?></textarea></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" value="Update Topic" class="btn btn-primary btn-block" />
							</td>
						</tr>
						<?php
					}else{
						?>
						<tr>
							<td colspan="2">
								<?php _warning('No Data Found'); ?>
							</td>
						</tr>
						<?php
					}
				?>
				
			</table>
			</form>
		</div>
	</div>
</div>
<!-- Content End -->
<?php include('common/footer.php'); ?>