<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>Assign student leave</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-10 col-lg-push-1 well">

<!-------register form start from here--------------->

<form method="post" action="insert-leave.php">
  <fieldset>
    <legend>Assign Leave <a href="all-leave.php" class="btn btn-primary" style="margin:5px;">All Leave</a>
	<a href="all-applied-leave.php" class="btn btn-primary" style="margin:5px;">All Applied Leave</a></legend>
	<?php
	 if(isset($_SESSION['success'])){
		 echo $_SESSION['success'];
		 unset($_SESSION['success']);
	 }
	?>
	<!---left box---->
	<div class="col-lg-6">
	<fieldset class="form-group">
      <label class="col-lg-12"><b>Student lists</b></label>
	  <input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id'];?>">
	<?php
    $query="Select * from users where `role`='Student' order by user_id DESC";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	while($row=mysqli_fetch_array($res)){
		
  ?>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="std[]" value="<?php echo $row['user_id']; ?>" >
          <?php echo $row['name'];?>
        </label>
      </div>
	  	<?php } ?>
    </fieldset>
	</div>	
	<!---right box---->
	<div class="col-lg-9">
	<div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Valid From:</b></label>
	  <div class="col-lg-6">
      <input type="date" name="validfrm" placeholder="dd/mm/yyyy" class="form-control">
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Valid To:</b></label>
	  <div class="col-lg-6">
      <input type="date" name="validto" placeholder="dd/mm/yyyy" class="form-control">
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Earning Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="eleave" placeholder="No. of leave" class="form-control">
      </div>
	  <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Medical Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="mleave" placeholder="No. of leave" class="form-control">
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Casual Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="cleave" placeholder="No. of leave" class="form-control">
      </div>
   </div>
   </div>
	</div>	
	<div class="col=lg-12 col-lg-offset-6">
    <button type="submit" class="btn btn-primary">Submit</button>
	<button type="submit" class="btn btn-primary">Cancel</button>
	</div>
  </fieldset>
</form>

<!-----------register form end here---------------------->
</div>
</div>
</body>
</html>