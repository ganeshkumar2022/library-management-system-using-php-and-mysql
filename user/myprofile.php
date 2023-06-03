<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
label,h6
{
    font-weight:bold;
}
</style>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4">UPDATE PROFILE</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if(isset($_POST["profile_update"]))
{
$name=$_POST["name"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$uid=$_SESSION["uid"];
include('db.php');
$sql4="update user set name='$name',mobile='$mobile',email='$email' where id=$uid";
if(mysqli_query($con,$sql4))
{
    ?>
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Profile updated successfully.
</div>
    <?php
}
else
{
    ?>
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to update profile
</div>
<?php
}
}

?>
<div class="card shadow-lg mb-4">
<div class="card-header bg-danger text-white">My Profile</div>
<div class="card-body">
<?php
include('db.php');
$id=$_SESSION["uid"];
$sql5="select * from user where id=$id";
$result5=mysqli_query($con,$sql5);
$row5=mysqli_fetch_assoc($result5);
?>
<form name="myform" action="" method="post" autocomplete="off">
<h6>Student id : <span style="font-weight:normal;"><?=$row5["id"]?></span></h6>
<h6>Registered date : <span style="font-weight:normal;"><?=$row5["reg_time"]?></span></h6>
<div class="form-group">
    <label for="cip">Full name</label>
    <input type="text" class="form-control" name="name" value="<?=$row5['name']?>" onfocusin="namein(this)" onfocusout="nameout(this)" placeholder="Enter fullname" id="cip" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <label for="np">Mobile number</label>
    <input type="number" class="form-control" name="mobile" value="<?=$row5['mobile']?>" onfocusin="mobilein(this)" onfocusout="mobileout(this)" placeholder="Enter mobile number" id="np" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <label for="cp">Email</label>
    <input type="email" class="form-control" name="email" value="<?=$row5['email']?>" onfocusin="emailin(this)" onfocusout="emailout(this)" placeholder="Enter Email" id="cp" required>
    <span id="ne" class="text-danger"></span>
</div>
<div class="form-group">
    <input type="submit" name="profile_update" class="btn btn-danger" value="Update profile">
</div>
</form>
</div>
<script type="text/javascript">
    function namein(x)
    {
x.style.background="rgb(228, 249, 147)";
    }
    function nameout(x)
    {
x.style.background="white";
    }
    function mobilein(x)
    {
x.style.background="rgb(228, 249, 147)";
    }
    function mobileout(x)
    {
x.style.background="white";
    }
    function emailin(x)
    {
x.style.background="rgb(228, 249, 147)";
    }
    function emailout(x)
    {
x.style.background="white";
    }
</script>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row bg-dark p-4 text-white text-right">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
</body>
</html>