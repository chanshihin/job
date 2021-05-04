<?php
session_start();
$firstNo = rand(1, 10);
$secondNo = rand(1, 10);

$opSymbol = array("+", "-", "*");
$operator = rand(0, count($opSymbol) - 1);
$operator = $opSymbol[$operator];

$eqAns = 0;
switch($operator) {
	case "+":
		$eqAns = $firstNo + $secondNo;
		break;
	case "-":
		$eqAns = $firstNo - $secondNo;
		break;
	case "*":
		$eqAns = $firstNo * $secondNo;
		break;
}
$_SESSION["eqAns"] = $eqAns;
?>

<head><link rel="stylesheet" type="text/css" href="signup.css"></head>
<div class="header">
  	<h2>Enter the captcha to continue login</h2>
</div>
 
<form method = "post" action = "captchaHandler.php">
	<div class="input-group">
		<?php echo $firstNo . " " . $operator . " " . $secondNo . " = "; ?>
		<label>Enter the answer: </label>
		<input type="number" name="userAns" required>
	</div>
	<div class="input-group">
  		<button type="submit" class="btn" name="captcha">Submit</button>
  	</div>
</form>