<?php
$a=$_GET["email"];
include('db.php');
$sql="select * from user where email='$a'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    echo "<b style='color:red;'>Email already exists</b>";
}
else
{
    echo "<b style='color:green;'>Email available for registration</b>";
}
?>