<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//create a PHP statement that gets the new contact details
$user = $_POST['user'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$sr = $_POST['sr'];

//Confirm that all fields are set
if(isset($user) & isset($username) & isset($pass) & isset($sr)  ) 
{

//Confirm that an item has been selected
if(!(empty($user))){


//assemble insert string that allows entry of special characters 
$user=mysqli_real_escape_string($conn,$user); 
$username=mysqli_real_escape_string($conn,$username); 
$pass=mysqli_real_escape_string($conn,$pass);
$sr=mysqli_real_escape_string($conn,$sr);


$sql = "UPDATE users SET usertype='".$user."',username='".$username."',password='".$pass."' WHERE sr='".$sr."'  ";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('Selected user details updated successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=viewUsers.php'> ";
}


//Empty checker ends here-that ensures an item is selected
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=viewUsers.php'> ";}

//Isset ends here
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=viewUsers.php'> ";}
?>


