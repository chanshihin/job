<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
body{
	background-color: #f2f2f2;
}
h1{
  color: red;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  font-size: 80px;

}
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}




</style>
<head>
  <title>Search</title>
</head>
<body>
<h1><a href="fyp.html">Bubble</a></h1>
<form name="form1" method="get" action="search1.php">
	<input type="text" placeholder="Please enter your query" name="search" aria-label="Search" required><input type="image" src="search.png" name= "submit" alt="Submit" width="40" height="40">
 </form>
  <?php
  $search = $_GET ['search'];

  // connect to database
  $con = mysqli_connect('localhost', 'root', '', 'fyo');
  $sql = "SELECT * FROM fypppp WHERE MATCH(title,content)  AGAINST ('%" . $search . "%')";
  $result= $con->query($sql);
  $foundnum = mysqli_num_rows($result);


  if ($foundnum==0)
  {
    echo "We were unable to find a product with a search term of '<b>$search</b>'.";
  }
  else{
    echo "<h2><strong> $foundnum Results Found for \"" .$search."\" </strong></h2>";      

      // get num of results stored in database
    $sql = "SELECT * FROM fypppp WHERE MATCH(title,content)  AGAINST ('%" . $search . "%')";
    $getquery = mysqli_query($con,$sql);

    while($runrows = mysqli_fetch_array($getquery))
    {
      echo"<u><a href= 'samplessss/". $runrows["id"] .".html' style ='font-size: 30px' class='card-title'>". $runrows["title"] ."</a></u>";
      echo "<br>";
	  $okkk="";
	  for ($x = 0; $x <= 50; $x++) {
		  $okkk.= $runrows["content"][$x];
		}
	  $okkk.= "..........";
	  echo "<h3>". $okkk."</h3>";
      }}

  mysqli_close($con);
?>

</body>
</html>