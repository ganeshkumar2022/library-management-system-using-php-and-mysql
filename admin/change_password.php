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
<style>

</style>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4">USER UPDATE PASSWORD</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if(isset($_POST["submit"]))
{
$current_password=$_POST["current_password"];
$new_password=$_POST["new_password"];
$confirm_password=$_POST["confirm_password"];
include('db.php');
$sql3="select * from admin where password='$current_password'";
$result=mysqli_query($con,$sql3);
if(mysqli_num_rows($result)>0)
{
if($new_password==$confirm_password)
{
$id=$_SESSION["id"];
$sql4="update admin set password='$new_password' where id=$id";
if(mysqli_query($con,$sql4))
{
    ?>
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Password updated successfully.
</div>
    <?php
}
else
{
    ?>
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to update password
</div>
<?php
}
}
else
{
    ?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> Password and confirm password not equal
  </div>
  <?php 
}
}
else
{
    ?>
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Current password not match
</div>
    <?php
}

}
?>
<div class="card shadow-lg">
<div class="card-header bg-info text-white">Change Password</div>
<div class="card-body">
<form name="myform" action="" method="post" autocomplete="off">
<div class="form-group">
    <label for="cip">Current password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="current_password" placeholder="Enter current password" id="cip" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <label for="np">New password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="new_password" placeholder="Enter new password" id="np" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <label for="cp">Confirm password <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password" id="cp" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <input type="submit" name="submit" class="btn btn-info" value="Update password">
</div>
</form>
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