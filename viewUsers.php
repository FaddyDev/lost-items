<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>Unclaimed Items</title>

<script type="text/javascript">
function confirm_delete(id)
{
 if(confirm('This record will be deleted parmanently.\n Are you sure you want to continue?'))
 {
  window.location.href='deleteUsers.php?del='+id;
 }
 else{window.location.href='viewUsers.php';}
}
</script>
</head>

<body>
<div id="header"></div>
<div id="nav">
<ul>
  <li><a class="active" href="#">View Users</a></li>
  <li><a href="addusers.php">Add Users</a></li>
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
//Heading
echo "<center><h3>USERS</h3></center>";

//Select only  unclaimed items, 
$sql="SELECT * FROM users ORDER BY usertype";
$result=$conn->query($sql);

if($result->num_rows>0){
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='25%'>User Type</th> <th width='25%'>Username</th> <th width='25%'>Password</th>  <th width='25%' colspan='2'></th>  </tr>";
//Getting user details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["usertype"]."</td> 
<td> ".$row["username"]." </td>
<td> ".$row["password"]." </td>  

<td>  <a href='editUsers.php?edit=$row[sr]'>Edit</a></td>
<td>  <a href='javascript:confirm_delete($row[sr])'>Delete</a></td> 
</tr>";}
echo "</table> ";

}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('No items to be displayed')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";}



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
