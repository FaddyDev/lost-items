
<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
if(isset($_GET['del']))
{
$id = $_GET['del'];
//Since sr(serial) is unique, it will only delete the specific item's details
$sql="DELETE FROM items WHERE  sr='".$id."' ";
//$result=mysqli_query($sql) or die("Could not delete".mysqli_error());
$result=$conn->query($sql);
echo ("<script language='javascript'> window.alert('Deleted successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=AdminViewItems.php'> ";
}

?>