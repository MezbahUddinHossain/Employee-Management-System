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
    $user_id=$_GET['id'];
	echo $user_id;
	
	$query="delete from `users` where `user_id`='$user_id'";
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="Delete successfully";
		header('Location:dashboard.php');
	}else{
		echo "Not deleted";
	}
?>