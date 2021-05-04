<!DOCTYPE html>

<head><link rel="stylesheet" type="text/css" href="signup.css"></head>
<div class="header">
  	<h2>Change password</h2>
</div>
<form method="POST">
<div class="input-group">
<label>New password</label>
<input type="password" name="userPW" required>
</div>

<div class="input-group">
<label>Confirmed password</label>
<input type="password" name="cpw" required>
</div>

<div class="input-group">
  	<button type="submit" class="btn" name="chPW">Submit</button>
</div>
</form>
</div>

<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'job');
$userPW = '';
$cpw = '';
$userID = $_SESSION['userID'];

if (isset($_POST['chPW'])) {
	$userPW = $_POST['userPW'];
	$cpw = $_POST['cpw'];
	
	if ($userPW == $cpw) {
		$sql = "UPDATE acInfo SET userPW = '$userPW' WHERE userID = '$userID';";
		$result = $conn->query($sql);
		header('location: login.php');
	}
	else {
?>

<head><link rel="stylesheet" type="text/css" href="signup.css"></head>
<div class="header">
  	<h2>Change password</h2>
</div>
<form method="POST">
<div class="input-group">
<div class="error"><p>Two password does not match!</p></div>
<label>New password</label>
<input type="password" name="userPW" required>
</div>

<div class="input-group">
<label>Confirmed password</label>
<input type="password" name="cpw" required>
</div>

<div class="input-group">
  	<button type="submit" class="btn" name="chPW">Submit</button>
</div>
</form>
</div>
<?php	
	}
}
?>