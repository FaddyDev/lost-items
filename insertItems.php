<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//create a PHP statement that gets the new contact details
$type = $_POST['type'];
$name = $_POST['name'];
$place = $_POST['place'];


//Confirm that all fields are set
if(isset($type) & isset($name) & isset($place)  ) 
{

//Confirm that a type has been selected
if(!(empty($type))){

//set status to be unclaimed
$status = 'unclaimed';
//assemble insert string that allows entry of special characters

$type=mysqli_real_escape_string($conn,$type); 
$name=mysqli_real_escape_string($conn,$name); 
$place=mysqli_real_escape_string($conn,$place); 
$status=mysqli_real_escape_string($conn,$status); 

$sql = "insert into items (type,name,place,status)  values ( '".$type."','".$name."','".$place."','".$status."')";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('New item details saved successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";
}



//Empty checker ends here-that ensures an item type is selected
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";}

//Isset ends here
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";}

?>


