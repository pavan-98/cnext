<?php
session_start();
if(isset($_SESSION['Email']))
{
echo'
<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_SESSION['Email'].'<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">MyProfile</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="seller.html">keep items</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>';
}
echo "";
?>