<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>Claim Item</title>
</head>

<body>
<div id="header"></div>
<div id="nav">
<ul>
  <li><a class="active" href="#">Claim</a></li>
  <li><a href="unclaimeditems.php">Unclaimed Items</a></li>
   <li><a href="claimeditems.php">Claimed Items</a></li>
   <li><a href="contact_us.php">Contact</a></li>
   <li style="float:right"><a href="index.php">Home</a></li>
</ul>

</div>

<div id="container">
<?php
//Connect to database via another page
include_once("dbconn.php");
?>
<?php
//Just ensuring that we only continue if the user is logged in

if(isset($_GET['claim']))
{
$id=$_GET['claim'];
$sql="SELECT * FROM items WHERE sr='".$id."' ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
echo "<center><h3>CLAIM ITEM</h3></center>";
//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<form action='insertClaim.php' method='post'> <table>";
echo " <tr><td>Type:</td> <td> <input type='text' name='type' id='in' value='".$row["type"]."' readonly=''/> </td></tr> 
 <tr><td>Name/Number:</td> <td> <input type='text' name='name' id='in' value='".$row["name"]."' readonly=''/> </td></tr> 
 
 <tr><td>Place Found:</td> <td> <input type='text' name='place' id='in' value='".$row["place"]."' readonly=''/> </td></tr> 
 
 <tr></tr>
 
  <tr><td>Address:</td> <td> <input type='text' name='adrs' id='in' placeholder='Your Current Address' required/> </td></tr> 
  <tr><td>Phone:</td> <td> <input type='text' name='phone' id='in' placeholder='Your Phone Number' required/> </td></tr> 
 
<tr> <td><td><input type='hidden' name='sr' value='".$id."'/> </td>  <td> <input type='reset' size='10' value='Clear' id='submit' /> </td>
	 <td><input type='submit' size='10' value='Claim' id='submit' /></td> </tr>
</tr></table></form>";}

}
else{
//When items table is empty
echo ("<script language='javascript'> window.alert('No item details to be displayed')</script>");
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

