<?php
	include('../common/functions.php');
	if(isset($_GET['postid'])){
		$postid=(int)$_GET['postid'];
		$result=delete_post($postid);
		if($result['bool']==true){
			$_SESSION['flashMsg']='Data has been deleted';
			header("location:posts.php");
		}else{
			$_SESSION['flashMsg']='Data has not been deleted';
			header("location:posts.php");
		}
	}else{
		$_SESSION['flashMsg']='Data has not been deleted';
		header("location:posts.php");
	}
?>