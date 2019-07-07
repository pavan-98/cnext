<?php
$servername = "localhost";
$username = "id2653388_cnext";
$password = "cnext";
$dbname="id2653388_cnext";
$Email=$_POST["Email"];
$phoneno=$_POST["phoneno"];
if(strlen($phoneno)>11)
{
 echo"<script>window.location = '/login-reg.html';alert('Enter a vaild phone number');</script>";
}
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	$sql = "SELECT id ,email ,phonenumber FROM logins";                                     //selecting id , username , email from record and checking for the dual entry
    $result = $conn->query($sql);
    $iscorrect=false;
    while($row = $result->fetch_assoc()) {
		if($row["email"]==$Email)                    //if user name or the gmail matchs user is already present
		{
			$iscorrect=true;break;                                                 
		}
    }
	if($iscorrect==true)
	{echo"<script>window.location = '/login-reg.html';alert('A User with this e-mail is already Present');</script>";}
    else
	{
 $to = $Email;
 $subject = 'Login Credinals';
 $from = 'support@cnext.tk';
 $pass=mt_rand(1,9999999);
 // To send HTML mail, the Content-type header must be set
 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
 // Create email headers
 $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
 // Compose a simple HTML email message
 $message = '<html><body>';
 $message .='<center><div><font size=18px >Cnext</font>';
 $message .='<tr><td>Email</td><td>'.$Email.'</td></tr>';
$message .='<tr><td>password&ensp;</td><td>'.$pass.'</td></tr>';
 $message .= '</table><br><br>';
 $message .= 'login through <a href="http://cnext.tk/login-reg.html">http://cnext/login-reg.html</a><br>
any Quires send Mail to <a>support@cnext.tk</a>
</div>
</center>
</body>
</html>';
 // Sending email
  if(mail($to, $subject, $message, $headers)){
		$sql = "INSERT INTO logins (email,phonenumber,password)
         VALUES ('$Email','$phoneno','$pass')";
   if ($conn->query($sql) === TRUE) {
    echo"<script>window.location = '/login-reg.html';alert('Login Credinals are sent to Your Mail');</script>";
}
  } else{
     echo"<script>window.location = '/login-reg.html';alert('WE Cannot Find Your E-mail ');</script>";
  }
}
}