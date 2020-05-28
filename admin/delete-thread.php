<?php
	include('../common/functions.php');
	if(isset($_GET['threadid'])){
		$threadid=(int)$_GET['threadid'];
		$result=delete_thread($threadid);
		if($result['bool']==true){
			$_SESSION['flashMsg']='Data has been deleted';
			header("location:threads.php");
		}else{
			$_SESSION['flashMsg']='Data has not been deleted';
			header("location:threads.php");
		}
	}else{
		$_SESSION['flashMsg']='Data has not been deleted';
		header("location:threads.php");
	}
?>