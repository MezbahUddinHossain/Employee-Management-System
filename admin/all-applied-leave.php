<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>All Applied Leaves</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<?php
if(isset($_POST['approved'])){
	$status="Approved";
	$comment=$_POST['comment'];
	$ap_id=$_POST['ap_id'];
	$query="UPDATE `applied_leave` set `status`='$status',`comment`='$comment' where `ap_id`='$ap_id'";
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="Updated successfully";
	}else{
		echo "Data not updated, please try again";
	}
}
if(isset($_POST['rejected'])){
	$status="Rejected";
	$comment=$_POST['comment'];
	$ap_id=$_POST['ap_id'];
	$query="UPDATE `applied_leave` set `status`='$status',`comment`='$comment' where ap_id='$ap_id'";
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="Updated successfully";
	}else{
		echo "Data not updated, please try again";
	}
}

?>
<div class="container">
<div class="col-lg-12 col-sm-push-3 well">

<h3>All Applied Leaves</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
	  <th scope="col">Student Name</th>
	   <th scope="col">Earning Leave</th>
	    <th scope="col">Medical Leave</th>
		 <th scope="col">Casual Leave.</th>
      <th scope="col">From</th>
	   <th scope="col">To</th>
	   <th scope="col">Status</th>
	   <th scope="col">Comment</th>
	   <th scope="col">&nbsp;</th>
    </tr>
  </thead>
<tbody>
  <?php
    $i=1;
    $query="Select * from applied_leave join users on `users`.`user_id`=`applied_leave`.`apply_by`";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0){
		
	while($row=mysqli_fetch_array($res)){
		
  ?>
    <tr class="table-active">
      <th scope="row"><?php echo $i; ?></th>
	  <td><?php echo $row['name'];?></td>
      <td><?php echo $row['e_leave'];?></td>
      <td><?php echo $row['m_leave'];?></td>
      <td><?php echo $row['c_leave'];?></td>
	  <td><?php echo $row['l_from'];?></td>
	  <td><?php echo $row['l_to'];?></td>
	  <td style="color:green;"><?php echo $row['status'];?></td>
	  <td><form method="post" action="">
	  <textarea name="comment"></textarea></td>
	  <input type="hidden" name="ap_id" value="<?php echo $row['ap_id'];?>">
	  <td>
	  <button type="submit" name="approved" class="btn btn-primary">Approved</button>
	  <button type="submit" name="rejected" class="btn btn-primary">X</button>
	  </form>
	  </td>
    </tr>
	<?php $i++;}}else{
		echo "No record found!";
	} ?>
  </tbody>
</table> 
</div>
</div>
</body>
</html>