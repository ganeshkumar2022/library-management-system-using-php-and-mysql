<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4">EDIT AUTHOR</h4>
<div class="row">
<div class="col-md-4 offset-md-4">
<?php
$id=$_GET["id"];
include('db.php');
$sql3="select * from author where id=$id";
$result3=mysqli_query($con,$sql3);
$row=mysqli_fetch_assoc($result3);
if(isset($_POST["add_category"]))
{
$name=trim($_POST["name"]);
date_default_timezone_set("Asia/Kolkata");
$date=date("d-m-Y h:i:sa l");
include('db.php');
$sql="update author set name='$name',update_time='$date' where id=$id"; 
if(mysqli_query($con,$sql))
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Author Edited successfully.
</div>
    <?php
}
else
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to edit author.
</div>
    <?php
}

}
?>
<div class="card shadow-lg">
<div class="card-header bg-success text-white">Author info</div>
<div class="card-body">
<form name="myform" action="" method="post" onsubmit="return check()">
<div class="form-group">
    <label for="email">Category:</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row["name"]; ?>" placeholder="Enter auhtor name" id="email">
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <input type="submit" name="add_category" class="btn btn-success" value="Edit category">
</div>
</form>
<script type="text/javascript">
function check()
{
    var category=document.myform.name.value;
    var a=true;
    if(category==null || category=="")
    {
document.getElementById("ne").innerHTML="* please fill author field";
a=false;
    }
return a;
}
</script>

</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row bg-dark p-4 text-white text-right fixed-bottom">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
</body>
</html>