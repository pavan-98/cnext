<?php
session_start();
$servername = "localhost";
$username = "id2653388_cnext";
$password = "cnext";
$dbname="id2653388_cnext";
$Email=$_POST["Email"];
$pass=$_POST["pass"];
$conn = new mysqli($servername, $username, $password,$dbname);
$ok=0;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	$sql = "SELECT * FROM logins";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) {
			if($row["email"]==$Email&&$row["password"]==$pass)
			{
				$_SESSION['Email']=$row['email'];
                $_SESSION['pass']=$row["password"];
				$_SESSION['puserid']=$row["id"];
				$ok=1;
				break;
			}
		}
	}
	if($ok==1)
	{echo"<script>window.location = '/home.html';</script>";}
    else
	{echo"<script>alert('Email/password is wrong');window.location = '/login-reg.html';</script>";}
}
?>