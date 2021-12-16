<?php
//Connect to database via another page
include_once("dbconn.php");

?>
<?php
$user=$_POST['user'];
$usernm=$_POST['name'];
$pass=$_POST['pass'];

//Confirm that all fields are set
if(isset($user) & isset($usernm) & isset($pass) ) 
{
if(!(empty($user))){

$sql="SELECT COUNT(*) FROM users WHERE(usertype='".$user."' AND 	username='".$usernm."' AND password='".$pass."') ";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($query);

if($result[0]>0){
//Add if statement here to cater for different users, different users to log in differently
session_start();
//session_cache_expire(1);
$_SESSION['loggedIn']=$usernm;
header('Location:register.php');
}
else{
echo ("<script language='javascript'> window.alert('Login failed, check username and password then try again')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";
}


}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";}

}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";}

?>