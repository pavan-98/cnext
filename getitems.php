<?php
$servername = "localhost";
$username = "id2653388_cnext";
$password = "cnext";
$dbname="id2653388_cnext";
$categorie=$_GET["categorie"];
$conn = new mysqli($servername, $username, $password,$dbname);
$htmlmiddle="";$i=0;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
          if($row["categorie"]==$categorie)	
          {
		  if($i%3==0&&$i!=0)
		   $htmlmiddle=$htmlmiddle.'</div></div>';
	      if($i%3==0)
          if($i==0){$htmlmiddle=$htmlmiddle.'<div class="item active"><div class="row">';}
		  else{$htmlmiddle=$htmlmiddle.'<div class="item"><div class="row">';}
		$htmlmiddle=$htmlmiddle.'<div class="col-xs-4"><a href="https://google.com" target="_blank_"><img src="'.$row['imglink'].
		'"alt="Los Angeles" style="width:100%;"></a> </div>';
		$i=$i+1; 
   }  
 }
}
$htmlstart='
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="col-xs-12">
  <div id="myCarousel" class="carousel slide" data-interval="20000000" data-pause="hover" data-wrap="false" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">';
$htmlend='
	  </div>
	  </div></div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</body>
</html>';
echo $htmlstart.$htmlmiddle.$htmlend;
?>