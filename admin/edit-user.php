<?php
include"../auth/auth.php";
?>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script>
function formvalidation(){
	var name=$('#inputName').val();
	var email=$('#inputEmail').val();
	var password=$('#inputPassword').val();
	var passlength=$('#inputPassword').val().length;
	if(name=='')
	{
		alert("please enter your name");
		return false;
	}
	if(email=='')
	{
		alert("please enter your email");
		return false;
	}
}
</script>
</head>
<body>
<?php include "header.php"?>
<div class="container">
<div class="col-lg-8 col-sm-push-3 well">

<!-------register form start from here--------------->
<form method="post" action="update-user.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Edit User Details</legend>
	<?php
	 if(isset($_SESSION['success'])){
		 echo $_SESSION['success'];
		 unset($_SESSION['success']);
	 }
	?>
	<?php
	$user_id=$_GET['id'];
	$query="select * from users where user_id='user_id'";
	$res=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($res);
	?>
	<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
	<div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="inputName" id="inputName" aria-describedby="emailHelp" placeholder="Enter name" value="<?php echo $data['name'] ?>">
      <small name="inputName" id="inputName" class="form-text text-muted">We'll never share your name with anyone else.</small>
    </div>
  
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"  value="<?php echo $data['email'] ?>">
      <small name="inputEmail" id="inputEmail" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
    </div>
    <fieldset class="form-group">
      <legend>Depertment</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="depart" id="depart" value="ECE" <?php if($data['department']=='ECE'){echo "checked";}?>>
          ECE
        </label>
      </div>
      <div class="form-check disabled">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="depart" id="depart" value="ETE"  <?php if($data['department']=='ETE'){echo "checked";}?>>
          ETE
        </label>
      </div>
    </fieldset>
	<fieldset class="form-group">
      <legend>Role</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="role" id="role" value="Admin"  <?php if($data['role']=='Admin'){echo "checked";}?>>
          Admin
        </label>
      </div>
      <div class="form-check disabled">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="role" id="role" value="Student"  <?php if($data['role']=='Student'){echo "checked";}?>>
          Student
        </label>
      </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Update</button>
  </fieldset>
</form>

<!-----------register form end here---------------------->
</div>
</div>
</body>
</html>