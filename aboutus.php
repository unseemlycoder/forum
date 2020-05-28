<?php include('common/header.php'); ?>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 8px;
  margin: 2px 1px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

}
</style>
<?php
	$result=get_topics();
?>
			<!-- Content Start -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">About Us</div>
						<div class="panel-body">
							<p>Academico Foro is a discussion forum for students</p>
							</br>
							<p>Brought to you by:</p>
							<div class="panel-body">
							<ul>
								<li>Akash Murthy &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PES2201800266</li>
								<li>Hemant Sathish &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PES2201800045</li>
								<li>Rashaad Ahmed Khan &nbsp PES2201800512</li>
							</ul>
							</div>
							<button class="button button4" onclick="window.location.href = '<?php echo $path['siteUrl']; ?>/load.php'">Load</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
<?php include('common/footer.php'); ?>