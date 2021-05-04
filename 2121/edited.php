<html>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="css/style3.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

   <!-- Top header -->
   <header class="w3-container w3-xlarge">
    <p class="w3-right">
	<a href="payment.php" class="w3-bar-item w3-button">Payment History</a>
      <a href="search.php" class="w3-bar-item w3-button">Search</a>
      <a href="index.php" class="w3-bar-item w3-button">Logout</a>
    </p>
  </header>


<!-- Left Menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-small">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>MICROHARD</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <h3><a href="phone.php" class="w3-button w3-block w3-white w3-left-align" style = "height:70px">HOME </a><h3>
      <h3><a href="profile.php" class="w3-button w3-block w3-white w3-left-align" style = "height:70px">PROFILE </a><h3>

    <h3 style = "height:70px">PRODUCT:</h3>
     <a href="phone.php" class="w3-button w3-block w3-white w3-left-align" style = "height:70px">PHONE </a>
    <a href="laptop.php" class="w3-button w3-block w3-white w3-left-align"style = "height:70px">LAPTOP </a>
    <a href="assesstory.php" class="w3-button w3-block w3-white w3-left-align"style = "height:70px">ACCESSORY </a>
    <a href="tablet.php" class="w3-button w3-block w3-white w3-left-align"style = "height:70px">TABLET </a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">
  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  <!-- End of the page *****Everytime copy from here******-->
  <!-- Image header -->
  <div class="w3-display-container w3-container">

  </div>
  <div class="w3-row-padding">
    <div class=" w3-margin-bottom">
      <ul class="w3-ul w3-light-grey">
        <li class="w3-dark-grey w3-xlarge w3-padding-16"><img src="image/profile.jpg" style="width:10%">
          <p class="w3-right" style="text-indent :1em;" ><a href="edit.php" onclick="w3_close()"class="w3-right" >Edit</a></p>
        </li>
		<center><?php
			session_start();
			$conn = mysqli_connect('localhost', 'root', '', 'job');
			$userid=$_SESSION['userName'];
			$pho=$_POST['phoneno'];
			$ema=$_POST['em'];
			$bt=$_POST['bth'];
			$sql = "UPDATE acInfo SET email='$ema' ,contactNo='$pho',dob='$bt' WHERE userID='$userid'";
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} 
			else {
				echo "Error updating record: " . $conn->error;
			}

	?>
	<p><a href="profile.php">View Profile</p><center>
      </ul>
    </div>
  </div>
</div>
<script>
// Accordion
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</body>
</html>
