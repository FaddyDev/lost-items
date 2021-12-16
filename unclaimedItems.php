<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<title>Unclaimed Items</title>

</head>

<body>
<div id="header"></div>
<div id="nav">
<ul>
  <li><a class="active" href="#">Unclaimed Items</a></li>
  <li><a href="claimedItems.php">Claimed Items</a></li>
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

//Heading
echo "<center><h3>LOST AND FOUND ITEMS</h3></center>";

//Select only  unclaimed items, 
$status = 'unclaimed';
$sql="SELECT * FROM items WHERE status='".$status."' ORDER BY name";
$result=$conn->query($sql);

if($result->num_rows>0){
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='40%'>Item Type</th> <th width='40%'>Name/Number</th> <th width='40%'>Place Found</th> <th width='40%' </th>  </tr>";
//Getting item details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["type"]."</td> 
<td> ".$row["name"]." </td>
<td> ".$row["place"]." </td> 

<td>  <a href='claim.php?claim=$row[sr]'>Claim</a></td>
</tr>";}
echo "</table> ";

}
else{
//When items table is empty
echo ("<script language='javascript'> window.alert('No items to be displayed')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";}

?>

</div>
<div id="footer">
&copy;UoN:<?php echo date("Y") ?> 
</div>
</body>
</html>
