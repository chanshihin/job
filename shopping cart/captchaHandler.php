<?php session_start();
?>

<?php
$eqAns = '';
$userAns = '';
$eqAns = $_SESSION["eqAns"];
$userAns = $_POST["userAns"];

if ($eqAns == $userAns)
	//echo $row['userName'] . "login successfully" . "<br>refresh to <a href = 'homepage.html?location=home'>home page</a> after 5 seconds";
	header('location:phone.php');
else {
?>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="loginHandler.php" >
  	<?php include('signupErrorCheck.php'); ?>
  	<div class="input-group">
	<div class="error"><p>Incorrect Captcha!</p></div>
  		<label>Username</label>
  		<input type="text" name="userName" required>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="userPW" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a><br>
		<a href="forgetPW.html">Forget password</a>
  	</p>
  </form>
</body>

<?php
}
?>