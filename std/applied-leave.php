<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>Applied Leave</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-10 col-sm-push-3 well">

<h3>All Applied Leave Status </h3>
<table class="table table-hover">
  <thead>
    <tr>
	<th scope="col">Sr no.</th>
	   <th scope="col">Earning Leave</th>
	    <th scope="col">Medical Leave</th>
		 <th scope="col">Casual Leave.</th>
      <th scope="col">Leave From</th>
	   <th scope="col">Leave To</th>
	   <th scope="col">Status</th>
    </tr>
  </thead>
<tbody>
  <?php
    $i=1;
	$user_id=$_SESSION['user_id'];
    $query="Select * from applied_leave where `apply_by`=$user_id";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0){
		
	while($row=mysqli_fetch_array($res)){
		
  ?>
    <tr class="table-active">
	  <td><?php echo $i; ?></td>
	  <td class="mleave"><?php echo $row['e_leave'];?></td>
      <td class="mleave"><?php echo $row['m_leave'];?></td>
      <td class="cleave"><?php echo $row['c_leave'];?></td>
	  <td><?php echo $row['l_from'];?></td>
      <td class="eleave"><?php echo $row['l_to'];?></td>
	  <td class="v_from" style="color:green;"><?php echo $row['status'];?></td>
	  
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