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

//login account process

if(isset($_POST['inputEmail'])){
	$email=$_POST['inputEmail'];
	$pass=$_POST['password'];
	//sql query for get data from database......
	$query="Select * from users where email='$email' AND password='$pass'";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res);//fetching data from database
	if($count==1){
		//$_SESSION['success']="Welcome admin";
		// header('Location:login.php');
		$session_id=session_id();
		$_SESSION['auth']=$session_id;
		$_SESSION['user_id']=$row['user_id'];
		$role=$row['role'];
		//checking for admin...
		if($role=='Admin'){
			header('Location:admin/dashboard.php');
		//checking for student....
		}elseif($role=='Student'){
			header('Location:std/dashboard.php');
		}else{
			$_SESSION['error']="Wrong Email or password";
		    header('Location:login.php');
		}
	}else{
		$_SESSION['error']="Wrong Email or password";
		 header('Location:login.php');
	}
}
?>