<?php include('forgetPWHandler.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forget Password</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
  <div class="header">
  	<h2>Forget Password</h2>
  </div>
	 
  <form method="post" action="forgetPWHandler.php">
  	<?php include('signupErrorCheck.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="userName" required>
  	</div>
  	<div class="input-group">
		Please fill in the following information to get your password.<hr>
  		<label>Contact Number</label>
  		<input type="text" name="contactNo" required>
  	</div>
	<div class="input-group">
  		<label>Date of birth</label>
  		<input type="date" name="dob" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="forgetPW">Submit</button>
  	</div>
  	<p>
		<a href="login.php">Back</a>
  	</p>
  </form>
</body>
</html>