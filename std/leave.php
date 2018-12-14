<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>Leave</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-10 col-sm-push-3 well">

<h3>Leave Lists <a href="applied-leave.php" class="btn btn-primary" style="margin:5px;">All Applied leave </a></h3>
<table class="table table-hover">
  <thead>
    <tr>
	<th scope="col">Student Name</th>
	   <th scope="col">Earning Leave</th>
	    <th scope="col">Medical Leave</th>
		 <th scope="col">Casual Leave.</th>
      <th scope="col">Valid From</th>
	   <th scope="col">Valid To</th>
    </tr>
  </thead>
<tbody>
  <?php
    $i=1;
	$user_id=$_SESSION['user_id'];
    $query="Select * from assign_leave join users on `users`.`user_id`=`assign_leave`.`assign_to` where users.user_id=$user_id";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0){
		
	while($row=mysqli_fetch_array($res)){
		
  ?>
    <tr class="table-active">
	  <td><?php echo $row['name'];?></td>
      <td class="eleave"><?php echo $row['e_leave'];?></td>
      <td class="mleave"><?php echo $row['m_leave'];?></td>
      <td class="cleave"><?php echo $row['c_leave'];?></td>
	  <td class="v_from"><?php echo $row['v_from'];?></td>
	  <td class="v_to"><?php echo $row['v_to'];?></td>
	  
    </tr>
	<?php $i++;}}else{
		echo "No record found!";
	} ?>
  </tbody>
</table>
<div class="col-lg-12" style="background:#8A2BE2;">
<form method="post" action="apply-leave.php">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
  <fieldset>
    <legend>Apply Leave</legend>
	<?php
	 if(isset($_SESSION['success'])){
		 echo $_SESSION['success'];
		 unset($_SESSION['success']);
	 }
	?>
	<!---left box---->
	<!---right box---->
	<div class="col-lg-9">
	<div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Leave From:</b></label>
	  <div class="col-lg-6">
      <input type="date" name="l_from" placeholder="dd/mm/yyyy" class="form-control" onblur="checkDate(this.value)">
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Leave To:</b></label>
	  <div class="col-lg-6">
      <input type="date" name="l_to" placeholder="dd/mm/yyyy" class="form-control" onblur="checkDate(this.value)">
      </div>
   </div>
   
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Earning Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="eleave" placeholder="No. of leave" class="form-control" onblur="checkeleavequan(this.value)">
      </div>
	  <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Medical Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="mleave" placeholder="No. of leave" class="form-control" onblur="checkmleavequan(this.value)">
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1" class="col-lg-6"><b>Casual Leave:</b></label>
	  <div class="col-lg-6">
      <input type="text" name="cleave" placeholder="No. of leave" class="form-control" onblur="checkcleavequan(this.value)">
      </div>
   </div>
   </div>
	</div>	
	<div class="col=lg-12">
    <button type="submit" class="btn btn-primary">Submit</button>
	<button type="submit" class="btn btn-primary">Cancel</button>
	</div>
  </fieldset>
</form>
</div>
</div>
</div>
<script>
function checkDate(str){
	var vfrm=$('.v_from').text();
	var vto=$('.v_to').text();
	var lfrm=str;
	var date1= new Date(vfrm);
	var date2=new Date(lfrm);
	var diffDays=parseInt((date2-date1)/(1000*60*60*24));
	var date3= new Date(lfrm);
	var date4=new Date(vto);
	var diffDays2=parseInt((date4-date3)/(1000*60*60*24));
	if(diffDays>=0&& diffDays2>=0){
		
	}else{
		alert('please enter valid date');
	}
}
function checkeleavequan(str){
	var vfrm=$('.eleave').text();
	var lqt=str;
	if(vfrm>=lqt){
		return true;
	}else{
		alert('Please enter vaild earning leave quantity');
		return false;
	}
}
function checkmleavequan(str){
	var vfrm=$('.mleave').text();
	var lqt=str;
	if(vfrm>=lqt){
		return true;
	}else{
		alert('Please enter vaild medical leave quantity');
		return false;
	}
}
function checkcleavequan(str){
	var vfrm=$('.cleave').text();
	var lqt=str;
	if(vfrm>=lqt){
		return true;
	}else{
		alert('Please enter vaild casual leave quantity');
		return false;
	}
}
</script>
</body>
</html>