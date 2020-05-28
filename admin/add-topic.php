<?php include('common/header.php'); ?>
<!-- Content Start -->
<div class="row">
	<ul class="breadcrumb">
		<li><a href="index.php">Dashboard</a></li>
	</ul>
</div>

<div class="row">
	<?php
		if(isset($_POST['submit'])){
			$data=array();
			$data['title']=mysqli_escape_string($con,$_POST['topic_title']);
			$data['description']=mysqli_escape_string($con,$_POST['topic_desc']);
			$addRes=add_topic($data);
			if($addRes['bool']==true){
				echo _success($addRes['msg']);
			}else{
				echo _warning($addRes['msg']);
			}
		}
	?>
	<div class="panel panel-danger">
		<div class="panel-heading">Add Topic <a href="topics.php" class="pull-right white-text"><i class="fa fa-long-arrow-left"></i> Topic List</a></div>
		<div class="panel-body">
			<form action="" method="post">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Title</th>
						<td><input type="text" class="form-control" name="topic_title" /></td>
					</tr>
					<tr>
						<th>Description</th>
						<td><textarea class="form-control" name="topic_desc"></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="Add Topic" class="btn btn-primary btn-block" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<!-- Content End -->
<?php include('common/footer.php'); ?>