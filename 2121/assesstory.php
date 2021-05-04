<html>
<title>Assesstory</title>
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

  <!-- moving tap -->
<button style = "width: 25%;"class="tablink" onclick="location.href='assesstory.php'" >SCREEN</button>
<button style = "width: 25%;"class="tablink" onclick="location.href='headset.php'">HEADSET</button>
<button style = "width: 25%;"class="tablink" onclick="location.href='keyboard.php'">KEYBOARD</button>
<button style = "width: 25%;"class="tablink" onclick="location.href='mouse.php'">MOUSE</button>


<!-- start of each brand -->
<div id="Home" class="tabcontent" style= "background-color:white">
  <h1 style = "color:black">Assesstory.</h1>
  <h2 style = "color:black">Screen:</h2>
  <div class="w3-row-padding w3-grayscale">
    <!-- start of each items -->
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="image/1.jpg"  style="width:100%">
        <div class="w3-container">
          <h3>Name</h3>
          <p class="w3-opacity">description.....</p>
          <p>Brand:</p>
          <p>$Price</p>
          <p>In Stock: (number)</p>
          <p class="w3-right" style="text-indent :1em;" ><a href="??????.html" onclick="w3_close()"class="w3-right" >+Favourite</a></p>
          <p class="w3-right" style="text-indent :1em;" ><a href="??????.html" onclick="w3_close()"class="w3-right" >+Trolley</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<html lang="en"><head>
<TITLE>PHP Shopping Cart without Database</TITLE>
<link href="css/style5.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php 
require_once "screen.php";
?>
<div class="clear-float"></div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><img src="image/icon-empty.png" /> Empty Cart</a></div>
<div id="cart-item">
<?php 
require_once "ajax-action.php";
?>
</div>
</div>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
        case "add":
            queryString = 'action=' + action + '&code=' + product_code
                    + '&quantity=' + $("#qty_" + product_code).val();
            break;
        case "remove":
            queryString = 'action=' + action + '&code=' + product_code;
            break;
        case "empty":
            queryString = 'action=' + action;
            break;
        }
    }
    jQuery.ajax({
        url : "ajax-action.php",
        data : queryString,
        type : "POST",
        success : function(data) {
            $("#cart-item").html(data);
            if (action == "add") {
                $("#add_" + product_code + " img").attr("src",
                        "image/icon-check.png");
                $("#add_" + product_code).attr("onclick", "");
            }
        },
        error : function() {
        }
    });
}
</script>
</body>
</html>
