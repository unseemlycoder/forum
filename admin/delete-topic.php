<?php
	include('../common/functions.php');
	if(isset($_GET['topicid'])){
		$topicid=(int)$_GET['topicid'];
		$result=delete_topic($topicid);
		if($result['bool']==true){
			$_SESSION['flashMsg']='Data has been deleted';
			header("location:topics.php");
		}else{
			$_SESSION['flashMsg']='Data has not been deleted';
			header("location:topics.php");
		}
	}else{
		$_SESSION['flashMsg']='Data has not been deleted';
		header("location:topics.php");
	}
?>