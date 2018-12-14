<?php
session_start();
//db connection
$host="localhost";
$username="root";
$pass="";
$db="ems";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

//insert query for register page
if(isset($_POST['inputEmail'])){
	$user_id=$_POST['user_id'];
	$name=$_POST['inputName'];
	$email=$_POST['inputEmail'];
	$pass=$_POST['password'];
	$depart=$_POST['depart'];
	$role=$_POST['role'];
	if($pass==''){
		$query="UPDATE users SET `name`='$name',`email`='$email',`department`='$depart',`role`='$role'
		where `user_id`='$user_id'";
	}else{
	$query="UPDATE users SET `name`='$name',`email`='$email',`password`='$pass',`department`='$depart',`role`='$role'
	where `user_id`='$user_id'";
	}
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="Data updated successfully";
		header('Location:dashboard.php');
	}else{
		echo "Data not updated, please try again";
	}
}
?>