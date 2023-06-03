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
<h4 class="mt-4">ISSUE A NEW BOOK</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if(isset($_POST["add_issue"]))
{
$sid=$_POST["sid"];
$bid=$_POST["bid"];
date_default_timezone_set("Asia/Kolkata");
$date=date("d-m-Y h:i:sa l");
include('db.php');
$sql="insert into issue_book (user_id,book_id,issue_date) values ($sid,$bid,'$date')";

if(mysqli_query($con,$sql))
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Book Issued successfully.
</div>
    <?php
}
else
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to Issue book.
</div>
    <?php
}

}
?>
<div class="card shadow-lg">
<div class="card-header bg-info text-white">Issue Book info</div>
<div class="card-body">
<form name="myform" action="" method="post">
<div class="form-group">
    <label for="email">Student Id <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="sid" onfocusout="fun1(this.value)" placeholder="Enter Student ID" id="email" required>
    <span id="ne" class="text-danger"></span>
    <span id="check1"></span>
</div>
<div class="form-group">
    <label for="email">Isbn number or Book title <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="title" onfocusout="fun2(this.value)" placeholder="Enter isbn number or book title" id="email" required>
    <span id="ne" class="text-danger"></span>
    <span id="check2"></span>
</div>
<div class="form-group">
    <input type="submit" name="add_issue" class="btn btn-info" value="Issue Book">
</div>
</form>
</div>

<script type="text/javascript" src="check.js"></script>

</div>
</div>
</div>
</div>
<div class="container-fluid mt-5">
<div class="row bg-dark p-4 text-white text-right">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
</body>
</html>