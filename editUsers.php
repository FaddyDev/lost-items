<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>Edit Users</title>
</head>

<body>
<div id="header"></div>
<div id="nav">
<ul>
  <li><a class="active" href="#">Edit Users</a></li>
   <li><a href="addusers.php">Add Users</a></li>
  <li><a href="viewUsers.php">View Users</a></li>
  <li><a href="register.php">Add Items</a></li>
   <li><a href="AdminViewItems.php">View Items</a></li>
   <li><a href="contact_us.php">Contact</a></li>
   <li style="float:right"><a href="logout.php">Log Out</a></li>
</ul>

</div>

<div id="container">
<?php
//Connect to database via another page
include_once("dbconn.php");
?>
<?php
//Just ensuring that we only continue if the user is logged in
session_start();
if (isset($_SESSION['loggedIn']) ) 
{

if(isset($_GET['edit']))
{
$id=$_GET['edit'];
$sql="SELECT * FROM users WHERE sr='".$id."' ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
echo "<center><h3>UPDATE USERS</h3></center>";
//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<form action='updateUsers.php' method='post'> <table>";
echo "<tr> <td>Type</td> <td> <select id='in' name='user'>
<option value='".$row["usertype"]."'>".$row["usertype"]."</option>
<option value='Admin'>Admin</option>

</select></td></tr>

 <tr><td>Username:</td> <td> <input type='text' name='username' id='in' value='".$row["username"]."' required/> </td></tr> 
 
 <tr><td>Password</td> <td> <input type='text' name='pass' id='in' value='".$row["password"]."' required/> </td></tr> 
 
 
 
<tr> <td><input type='hidden' name='sr' value='".$id."'/> </td> <td> <input type='reset' size='10' value='Clear' id='submit' /> </td>
	 <td><input type='submit' size='10' value='Update' id='submit' /></td> </tr>
</tr></table></form>";}

}
else{
//When items table is empty
echo ("<script language='javascript'> window.alert('No item details to be displayed')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";}
}

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

