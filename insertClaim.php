<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//create a PHP statement that gets the new contact details
$adrs = $_POST['adrs'];
$phone = $_POST['phone'];
$sr = $_POST['sr'];

$status = 'claimed';
//Confirm that all fields are set
if(isset($adrs) & isset($phone) & isset($sr)    ) 
{
//Automatically provide the claim date
$my = date("M/Y");
$dt = date("d") + 1; //1 added to get exact curent date
$date = ' '.$dt.'/'.$my.' ';

//assemble insert string that allows entry of special characters 
$adrs=mysqli_real_escape_string($conn,$adrs); 
$phone=mysqli_real_escape_string($conn,$phone); 
$status=mysqli_real_escape_string($conn,$status);
$date=mysqli_real_escape_string($conn,$date);
$sr=mysqli_real_escape_string($conn,$sr);


$sql = "UPDATE items SET address='".$adrs."',phone='".$phone."',date='".$date."',status='".$status."' WHERE sr='".$sr."'  ";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('Selected item claimed successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=unclaimeditems.php'> ";
}


//Isset ends here
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=unclaimeditems.php'> ";}
?>


