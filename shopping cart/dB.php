<?php	
	$db_hostname = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_database = "job";

	//create connection
	$conn = mysqli_connect(
		$db_hostname, $db_username, $db_password, $db_database);
	if(!$conn)
		die("Unable to connect to MySQL:".mysqli_connect_error());
	else
		echo "UUG";

?>