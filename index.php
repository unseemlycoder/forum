<?php include('common/header.php'); ?>
<?php
	$result=get_topics();
?>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Hey!</div>
						<img src="<?php echo $path['siteUrl']; ?>/img/forum.png" align="right" style="width:160px;height:160px;">
						<div class="panel-body">
							<p>Welcome to AcademicoForo</p>
							</br>
							<p>A place for like minded students who are in search for answers</p>
							<p>Feel free to browse through our collection of threads, topics and more</p>
							</br>
							<p>Login to interact with other users</p>
							<div class="panel-body">
							
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Topics <span class="badge"><?php echo $result['totalResult']; ?></span></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tr>
									<th>Topic Title</th>
									<th>Threads</th>
								</tr>
								<?php
									if($result['totalResult']>0){
										foreach($result['allData'] as $data){
											$threads=count_total_threads($data['topic_id']);
											// _t($threads);
								?>
								<tr>
									<td><a href="threads.php?topicid=<?php echo $data['topic_id']; ?>&title=<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></td>
									<td><a href="threads.php?topicid=<?php echo $data['topic_id']; ?>&title=<?php echo $data['title']; ?>"><?php echo $threads['total']; ?></a></td>
								</tr>
							<?php } }else{ ?>
							<tr>
								<td colspan="2"><?php echo _warning('No Data Found'); ?></td>
							</tr>
							<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>