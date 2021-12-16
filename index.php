<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>lost items</title>
</head>

<body>
<div id="header"> LOST AND FOUND ITEMS MANAGEMENT SYSTEM </div>
<div id="nav">

<ul>
  <li><a class="active" href="#home">Home</a></li>
    <li><a href="claimedItems.php">Claimed Items</a></li>
  <li><a href="unclaimeditems.php">Unclaimed Items</a></li>
   <li><a href="contact_us.php">Contact</a></li>
</ul>

</div>
<div id="container">

<fieldset><legend>Log In </legend>
<form action="login.php" method="post">
<table>
<tr> <td>User Type</td> <td> <select id="in" name="user"> 
<option value="">Select User</option>
<option value="Admin">Admin</option>
</select></td></tr>
<tr> <td> User Name</td> <td><input type="text" name="name" id="in" placeholder="Your Username" required/></td></tr>
<tr><td>password</td><td><input type="password" name="pass" id="in" required/></td></tr>
<tr><td></td><td><input type="reset" value="clear" id="submit"/></td><td><input type="submit" value="login" id="submit"/></td></tr>
</table>
</form>
</fieldset>

</div>
<div id="footer">
&copy;UoN:<?php echo date("Y") ?> 
</div>
</body>
</html>
