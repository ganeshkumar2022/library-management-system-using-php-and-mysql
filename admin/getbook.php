<?php
$book=$_GET["id"];
include('db.php');
$sql="select * from book where isbn='$book' or name like '%$book%'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
echo "<div style='display:flex;flex-wrap:wrap;'>";
while($row=mysqli_fetch_assoc($result))
{
// $bid=$row["id"];
// $sql2="select * from issue_book where book_id=$bid and returned_date='Not returned yet'";
// $result2=mysqli_query($con,$sql2);
// if(mysqli_num_rows($result2)>0)
// {
//     $st="<span class='text-danger'>Books already issued</span>";
// }
    ?>
<div style="margin:10px;text-align:center;">
    <img src="<?php echo $row['myimage']; ?>" height="100" width="100"><br>
    <b><?php echo $row["name"]; ?></b><br>
    <?php if(isset($st)) { echo $st."<br>"; } ?>
    <input type="checkbox" name="bid" value="<?php echo $row['id']; ?>">
</div>
    <?php
}
echo "</div>";
}
else
{
    echo "<b style='color:red;'>No isbn or book record found</b>";
}

?>