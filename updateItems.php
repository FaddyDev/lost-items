<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//create a PHP statement that gets the new contact details
$type = $_POST['type'];
$name = $_POST['name'];
$place = $_POST['place'];
$sr = $_POST['sr'];

//Confirm that all fields are set
if(isset($type) & isset($name) & isset($place) & isset($sr)  ) 
{

//Confirm that an item has been selected
if(!(empty($type))){


//assemble insert string that allows entry of special characters 
$type=mysqli_real_escape_string($conn,$type); 
$name=mysqli_real_escape_string($conn,$name); 
$place=mysqli_real_escape_string($conn,$place);
$sr=mysqli_real_escape_string($conn,$sr);


$sql = "UPDATE items SET type='".$type."',name='".$name."',place='".$place."' WHERE sr='".$sr."'  ";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('Selected item details updated successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=AdminviewItems.php'> ";
}


//Empty checker ends here-that ensures an item is selected
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=AdminviewItems.php'> ";}

//Isset ends here
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=AdminviewItems.php'> ";}
?>


