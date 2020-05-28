<?php
	include('../common/functions.php');
	if(isset($_GET['userid'])){
		$userid=(int)$_GET['userid'];
		$result=delete_user($userid);
		if($result['bool']==true){
			$_SESSION['flashMsg']='Data has been deleted';
			header("location:users.php");
		}else{
			$_SESSION['flashMsg']='Data has not been deleted';
			header("location:users.php");
		}
	}else{
		$_SESSION['flashMsg']='Data has not been deleted';
		header("location:users.php");
	}
?>