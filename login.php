<?php
session_start();
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script>
function formvalidation(){
	var email=$('#inputEmail').val();
	var password=$('#inputPassword').val();
	var passlength=$('#inputPassword').val().length;
	if(email=='')
	{
		alert("please enter your email");
		return false;
	}
	if(password=='')
	{
		alert("please enter your password");
		return false;
	}
	if(passlength<=4)
	{
		alert("please enter minimum 5 digit password");
		return false;
	}
}
</script>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">EMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto"> 
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<div class="container">
<div class="col-lg-8 col-sm-push-3 well">

<!-------register form start from here--------------->
<form method="post" action="login-account.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Login</legend>
	<?php
	//for response if loging is done or not.....
	 if(isset($_SESSION['error'])){
		 echo$_SESSION['error'];
		 unset($_SESSION['error']);
	 }
	 if(isset($_SESSION['success'])){
		 echo $_SESSION['success'];
		 unset($_SESSION['success']);
	 }
	?>
  
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
      <small name="inputEmail" id="inputEmail" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </fieldset>
</form>

<!-----------register form end here---------------------->
</div>
</div>
</body>
</html>