<?php
	// Database connectivity
session_start();
$con=mysqli_connect('localhost','root','','forum');

// error_reporting(0);

// Debug
function _t($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

// Message Confiuration
function _warning($str){
	echo '<p class="alert alert-warning">'.$str.'</p>';
}

function _success($str){
	echo '<p class="alert alert-success">'.$str.'</p>';
}

function _error($str){
	echo '<p class="alert alert-danger">'.$str.'</p>';
}

// Path Configuration
function get_path(){
	$res=array();
	$res['siteUrl']='http://localhost/discussionforum';
	// $res['siteUrl']='http://localhost/projects/CorePhp/discussionforum';
	return $res;
}
$path=get_path();

// **
// Admin Functionality Start
// **

// Admin Login
function admin_login($data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM admin WHERE username='".$data['username']."' AND pwd='".$data['pwd']."'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

/* =========== Add Topic =========== */
function add_topic($data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO topics (title,description) VALUES ('".$data['title']."','".$data['description']."')");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been added';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

/* =========== Topic List =========== */
function get_topics(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM topics");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get ALl Threads
function get_threads(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get ALl Posts
function get_posts(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get ALl Users
function get_users(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM users");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

/* =========== Get Topic By ID =========== */
function get_topic_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM topics WHERE topic_id='$id' ORDER BY topic_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		$data=mysqli_fetch_assoc($query);
		$res['allData']=$data;
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

/* =========== Update Topic =========== */
function update_topic($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"UPDATE topics SET title='".$data['title']."', description='".$data['description']."' WHERE topic_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been updated';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}
/* =========== Edit Topic =========== */

/* =========== Delete Topic =========== */
function delete_topic($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM topics WHERE topic_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

/* =========== Delete Thread =========== */
function delete_thread($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM threads WHERE thread_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

/* =========== Delete Post =========== */
function delete_post($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM posts WHERE post_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

/* =========== Delete User =========== */
function delete_user($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM users WHERE user_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}


// **
// ## Admin Functionality End
// **


// **
// ## Frontend Functionality STart
// **

// Count total Posts
function count_total_topics(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total Threads
function count_totalthreads(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM threads");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total Posts
function count_totalposts(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total Users
function count_totalusers(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM users");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total threads of specific  topic
function count_total_threads($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM threads WHERE topic_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total threads of specific  topic
function count_total_posts($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts WHERE thread_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count total threads of specific  topic
function count_total_replies($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM replies WHERE post_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Get All Threads By Topic
function get_thread_by_topic($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads WHERE topic_id='$id' ORDER BY thread_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

function get_thread_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads WHERE thread_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		$data=mysqli_fetch_assoc($query);
		$res['allData']=$data;
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get All Threads By Topic
function get_posts_by_thread($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts WHERE thread_id='$id' ORDER BY post_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get All Posts By User
function get_posts_by_user($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts WHERE added_by='$id' ORDER BY post_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Get All Threads By Topic
function get_replies_by_post($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM replies WHERE post_id='$id' ORDER BY reply_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}


// Register User
function register_user($data){
	$res=array();
	global $con;
	// Check Username
	$checkUser=mysqli_query($con,"SELECT username FROM users WHERE username='".$data['user']."'");
	if(mysqli_num_rows($checkUser)>0){
		$res['bool']=false;
		$res['msg']='Username already exists!!';
	}else{
		$query=mysqli_query($con,"INSERT INTO users SET fname='".$data['fname']."',username='".$data['user']."',email='".$data['email']."',pwd='".$data['pwd']."',address='".$data['address']."'");
		if(mysqli_affected_rows($con)>0){
			$res['bool']=true;
			$res['msg']='User has been registered';
		}else{
			$res['bool']=false;
			$res['msg']=mysqli_error($con);
		}
	}
	return $res;
}

// Update User
function update_user($userid,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"UPDATE users SET fname='".$data['fname']."',username='".$data['user']."',email='".$data['email']."',address='".$data['address']."' WHERE user_id='$userid'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been Updated';
	}else{
		$res['bool']=false;
		$res['msg']='Data has not been Updated';
	}
	return $res;
}

function change_profile_pic($id,$img){
	$res=array();
	global $con;
	$query=mysqli_query($con,"UPDATE users SET img='$img' WHERE user_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Picture has been changed';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
		// $res['msg']=mysqli_error($con);
	}
	return $res;
}

// User IMAGE By ID
function get_user_profile_pic($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT img FROM users WHERE user_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
	}else{
		$res['bool']=false;
		$res['msg']='No Data Found!!';
	}
	return $res;
}

// User Login
function user_login($data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM users WHERE username='".$data['username']."' AND pwd='".$data['pwd']."'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
	}else{
		$res['bool']=false;
		$res['msg']='Invalid Username/Password';
		// $res['msg']=mysqli_error($con);
	}
	return $res;
}

// Change Password
function change_password($new){
	global $con;
	$query=mysqli_query($con,"UPDATE users SET pwd='$new' WHERE user_id='".$_SESSION['userData']['user_id']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// User By ID
function get_user_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM users WHERE user_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Get ALl Threads of user
function get_threads_by_user($userid){
	global $con;
	$res=array();
	$query=mysqli_query($con,"SELECT * FROM threads WHERE added_by='$userid'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Add Thread
function add_thread($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO threads SET topic_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been added';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Add Thread
function add_post($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO posts SET thread_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been added';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Add Thread
function add_reply($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO replies SET post_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Data has been added';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Update view of thread
function update_thread_view($id){
	global $con;
	mysqli_query($con,"UPDATE threads set views=views+1 WHERE thread_id='$id'");
}

// Count total threads view of specific  thread
function count_total_thread_views($id){
	global $con;
	$query=mysqli_query($con,"SELECT views FROM threads WHERE thread_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Update view of thread
function update_post_view($id){
	global $con;
	mysqli_query($con,"UPDATE posts SET views=views+1 WHERE post_id='$id'");
}

// Count total threads view of specific  thread
function count_total_post_views($id){
	global $con;
	$query=mysqli_query($con,"SELECT views FROM posts WHERE post_id='$id'");
	$res=mysqli_fetch_assoc($query);
	return $res;
}


?>