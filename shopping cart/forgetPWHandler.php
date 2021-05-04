<?php
session_start();

$userName = '';
$userPW = '';
$contactNo = '';
$dob = '';
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'job');

if (isset($_POST['forgetPW'])) {
	$sql="SELECT userName, userPW, contactNo, dob FROM acInfo";
	$result= $db->query($sql);
	while($row = $result->fetch_assoc()){
		if($_POST['userName'] == $row['userName'] && $_POST['contactNo']== $row['contactNo'] && $_POST['dob']== $row['dob']){
			echo 'Your login password is ' . $row['userPW'];
			echo "<br><a href = 'login.php?'>>>Go back to login page<<</a>";
		}
		else{
			echo 'Your information are not matched with the one you enter when ';
		}
	}
}
?>