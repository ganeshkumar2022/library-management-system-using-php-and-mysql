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
<h4 class="mt-4">ADD AUTHOR</h4>
<div class="row">
<div class="col-md-4 offset-md-4">
<?php
if(isset($_POST["add_category"]))
{
$name=trim($_POST["name"]);
date_default_timezone_set("Asia/Kolkata");
$date=date("d-m-Y h:i:sa l");
include('db.php');
$sql="insert into author values (null,'$name','$date','$date')";
if(mysqli_query($con,$sql))
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Author added successfully.
</div>
    <?php
}
else
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to add author.
</div>
    <?php
}

}
?>
<div class="card shadow-lg">
<div class="card-header bg-success text-white">author info</div>
<div class="card-body">
<form name="myform" action="" method="post" onsubmit="return check()">
<div class="form-group">
    <label for="email">Author name:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter author name" id="email">
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <input type="submit" name="add_category" class="btn btn-success" value="Add author">
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