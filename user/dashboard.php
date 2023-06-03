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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  a:hover
  {
    text-decoration:none;
  }
</style>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4 pb-3" style="border-bottom:2px solid lightgray;">USER DASHBOARD</h4>
<?php
include('db.php');
$uid=$_SESSION["uid"];
$sql="select count(*) as b from book";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$book=$row["b"];

$sql2="select count(*) as c from issue_book where user_id=$uid and returned_date='Not returned yet'";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
$ib=$row2["c"];

$sql3="select count(*) as d from issue_book where user_id=$uid";
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($result3);
$ib2=$row3["d"];
?>
<div class="row">

  <div class="col-md-4">
  <a href="issued-books.php">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-book-open text-success" style="font-size:70px;"></i>
      <p class="mt-2 text-secondary">Books listed</p>
      <p><?=$book?></p>
    </div>
  </div>
</a>
  </div>

  <div class="col-md-4">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-share-from-square text-primary" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">Books not returned yet</p>
    <p><?=$ib?></p>
    </div>
  </div>
  </div>

  <div class="col-md-4">
  <a href="issue.php">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-book text-danger" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">issued books</p>
    <p><?=$ib2?></p>
    </div>
  </div>
</a>
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