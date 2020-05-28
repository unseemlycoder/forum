<?php require('../common/functions.php'); ?>
<?php
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
		header("location:login.php");
	}
?>