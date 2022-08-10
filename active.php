<?php
session_start();
include('include/config.php');
$query=mysqli_query($con,"SELECT * FROM `userlog`");
while($row=mysqli_fetch_array($query))
{

	?>
	<?php  
if ($status == 0)
{
	echo "enable";
}
else
{
	echo"not";

}
?>