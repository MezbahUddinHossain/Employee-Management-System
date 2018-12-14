<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>View Message</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-8 col-sm-push-3 well">

<h3>Message Detail View</h3>
<?php
  $m_id=$_GET['id'];
  $query="Select * from task where `t_id`='".$m_id."'";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res);
		
?>
<div class="col-sm-12" style="background:#f9f9f9;padding:10px;">
<?php echo $row['task']?>
</div>
<div class="col-sm-10">
<?php
if(isset($_REQUEST['m_reply'])){
	$mid=$_POST['m_id'];
	$user_id=$_POST['user_id'];
	$reply=mysqli_real_escape_string($conn,$_POST['m_reply']);
	
	$query="insert into task_reply(`r_id`,`reply`,`m_id`,`reply_by`)values('','$reply','$mid','$user_id')";
	$res=mysqli_query($conn,$query);
	if($res){
		echo "Reply inserted ";
	}else{
		echo "error in reply, please try again";
	}
}
?>
<form action="" method="post">
<input type="hidden" name="m_id" value="<?php echo $m_id;?>">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
 <div class="form-group">
      <label for="exampleInputEmail1"><h3>Write your reply</h3></label>
	  <div class="col-lg-10">
<textarea name="m_reply" rows="10" style="width:100%; background:#d9d9d9"></textarea>
</div></div>
<div class="form-group">
 <div class="col-lg-10 col-lg-offset-2">
  <button type="submit" class="btn btn-primary">Submit Reply</button>
 </div>
</div>
</form>
</div>
<fieldset>
<p>&nbsp;</p>
 <?php
  $m_id=$_GET['id'];
  $query1="Select * from `task_reply` join users on `users`.`user_id`=`task_reply`.`reply_by` where `m_id`='".$m_id."'";
  $res1=mysqli_query($conn, $query1);
  $count1=mysqli_num_rows($res1);
  
  while($row1=mysqli_fetch_array($res1)){
	?> 
<div class="form-group">
      
	  <div class="col-lg-10">
 
	<div class="col-sm-12" style="background:#f9f9f9;padding:10px;">
	<?php echo $row1['name'].':  '.$row1['reply'];?>
</div>

</div></div>
</fieldset>
 <?php }?>
</div>
</div>
</div>
</body>
</html>