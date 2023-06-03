<?php
$id=$_GET["id"];
include('db.php');
$sql="select * from user where id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
    ?>
    <div style='color:green;'>
    Name : <?=$row['name']?><br>
    Email : <?=$row['email']?><br>
    Mobile : <?=$row['mobile']?>
    </div>
    <?php
}
}
else
{
    echo "<b style='color:red;'>No user records found</b>";
}

?>