<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>lost items</title>
</head>

<body>
<div id="header"></div>
<div id="nav">

<ul>
  <li><a class="active" href="#">Sign Up</a></li>
  <li><a href="viewUsers.php">View Users</a></li>
  <li><a href="register.php">Add Items</a></li>
  <li><a href="AdminViewItems.php">View Items</a></li>
   <li><a href="contact_us.php">Contact</a></li>
   <li style="float:right"><a href="logout.php">Log Out</a></li>
</ul>

</div>

<div id="container">
<?php
session_start();
if (isset($_SESSION['loggedIn']) ) 
{
echo "
<fieldset><legend>Register Item </legend>
<form action='createUser.php' method='post'>
<table>
<tr> <td>User Type</td> <td> <select id='in' name='user'>
<option value=''>Select user</option>
<option value='Admin'>Admin</option>
</select></td></tr>
<tr> <td> Username:</td> <td><input type='text' name='username' id='in' placeholder='Username' required/></td></tr>
<tr> <td> Password:</td> <td><input type='password' name='pass1' id='in'  required/></td></tr>
<tr> <td> Re-Enter Password:</td> <td><input type='password' name='pass2' id='in'  required/></td></tr>
<tr><td></td><td><input type='reset' value='Clear' id='submit'/></td><td><input type='submit' value='Save' id='submit'/></td></tr>
</table>
</form>
</fieldset>";
}
else{
//When session is not set, go to home page directly
echo ("<script language='javascript'> window.alert('You are not logged in, please log in again to continue.')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";}
?>
</div>
<div id="footer">
&copy;UoN:<?php echo date("Y") ?> 
</div>
</body>
</html>
