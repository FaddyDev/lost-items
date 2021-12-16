<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>lost items</title>
</head>
<?php
 //Log the user out automatically if they were logged in
session_start();
unset($_SESSION['loggedIn']);
//header('Location:index.php');
?>
<body>
<div id="header"></div>
<div id="nav">

<ul>
  <li><a class="active" href="#home">Contact</a></li>
    <li><a href="claimedItems.php">Claimed Items</a></li>
  <li><a href="unclaimeditems.php">Unclaimed Items</a></li>
   <li style="float:right"><a href="index.php">Home</a></li>
</ul>

</div>
<div id="container">



Agatha Gakuu Mwihaki: 0718212849, agakuu@ymail.com

</div>
<div id="footer">
&copy;UoN:<?php echo date("Y") ?> 
</div>
</body>
</html>
