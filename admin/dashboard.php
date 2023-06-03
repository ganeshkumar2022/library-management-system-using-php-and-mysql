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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4 pb-3" style="border-bottom:2px solid lightgray;">ADMIN DASHBOARD</h4>
<?php
include('db.php');
$sql1="select count(*) as book_count from book";
$sql2="select count(*) as author_count from author";
$sql3="select count(*) as category_count from category";
$sql4="select count(*) as user_count from user";
$sql5="select count(*) as ib_count from issue_book where returned_date='Not returned yet'";
$result1=mysqli_query($con,$sql1);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
$result4=mysqli_query($con,$sql4);
$result5=mysqli_query($con,$sql5);
$row1=mysqli_fetch_assoc($result1);
$row2=mysqli_fetch_assoc($result2);
$row3=mysqli_fetch_assoc($result3);
$row4=mysqli_fetch_assoc($result4);
$row5=mysqli_fetch_assoc($result5);
$book=$row1["book_count"];
$author=$row2["author_count"];
$category=$row3["category_count"];
$user=$row4["user_count"];
$ib=$row5["ib_count"];
?>
<div class="row">
  <div class="col-md-3">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-book-open text-success" style="font-size:70px;"></i>
      <p class="mt-2 text-secondary">Books listed</p>
      <p><?php echo $book; ?></p>
    </div>
  </div>
  </div>

  <div class="col-md-3">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-share-from-square text-primary" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">Books not returned yet</p>
    <p><?php echo $ib; ?></p>
    </div>
  </div>
  </div>

  <div class="col-md-3">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-users text-danger" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">Registered Users</p>
    <p><?php echo $user; ?></p>
    </div>
  </div>
  </div>
  <div class="col-md-3">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-user text-warning" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">Authors listed</p>
    <p><?php echo $author; ?></p>
    </div>
  </div>
  </div>
  <div class="col-md-3 my-2">
  <div class="card">
    <div class="card-body text-center">
    <i class="fa-solid fa-file-zipper text-info" style="font-size:70px;"></i>
    <p class="mt-2 text-secondary">Listed Categories</p>
    <p><?php echo $category; ?></p>
    </div>
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