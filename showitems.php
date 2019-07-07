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
	$htmlmiddle="";
$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
     $htmlmiddle=$htmlmiddle.'  <div class="col-md-3">
    <div class="thumbnail">
     <a href="https://google.com" target="_blank">
     <img src="http://www.promotionaltshirts.co.in/wp-content/uploads/2013/02/Round-Neck-T-Shirts-300x295.jpg" alt="Lights" style="width:100%">
      <div class="caption">
           <center><p>hello this is rohit</p></center>
          </div>
	 </a>
    </div> 
   </div>';
 }
}
$nav='
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Demo Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--<div style="background-color:#222222">-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  	   <a href="http://cnext.tk/home.html"><img class="navbar-brand" src="logo1.png"></img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	  <li style="margin-left:300px;"></li>
	  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://cnext.tk/getitems.php?categorie=T-shirt" target="output">T-shirt</a></li>
            <li><a href="http://cnext.tk/getitems.php?categorie=shoe" target="output">Shoes</a></li>
            <li><a href="#">mobiles</a></li>
          </ul>
        </li>
		</ul>
	  <form class="navbar-form navbar-center">
      <div class="input-group" id="form-search-box">
        <input type="text" class="form-control"  id="form-search-box" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
   </div>
</nav>
 <div class="container" style="margin-top:100px;">
  <div class="row">
';
 $htmlstart=$nav.' <div class="container" style="margin-top:100px;">
  <div class="row">';
 $htmlend=' </div>
 </div>
 </body>
 </html>';
 $html=$htmlstart.$htmlmiddle.$htmlend;
 echo $html;
?>