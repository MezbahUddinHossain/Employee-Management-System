<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>Task</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-8 col-sm-push-3 well">

<h3>All Task Lists</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Task</th>
	   <th scope="col">Date</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $query="Select * from task";
	$res=mysqli_query($conn, $query);
	$count=mysqli_num_rows($res);
	if($count>0){
		
	while($row=mysqli_fetch_array($res)){
		
  ?>
    <tr class="table-active">
      <th scope="row"><?php echo $i; ?></th>
      <td><a href="view-message.php?id=<?php echo $row['t_id'];?>"><?php echo substr($row['task'],0,50);?></a></td>
      <td><?php echo $row['date_time'];?></td>
	  <td><a href="view-message.php?id=<?php echo $row['t_id'];?>">View</a></td>
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