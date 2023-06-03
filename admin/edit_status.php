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
   td
   {
    padding:10px;
   }
   table td p
   {
   margin-left:70px;
   }
   input[type=number]:focus
   {
    background-color:moccasin;
   }
</style>
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="my-4">ISSUED BOOK DETAILS</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if(isset($_POST["return_book"]))
{
  include('db.php');
$user_id=$_GET["user_id"];
$book_id=$_GET["book_id"];
date_default_timezone_set('Asia/Kolkata');
$returned_date=date("d-m-Y h:i:sa l");
$fine=$_POST["amount"];
$sql="update issue_book set fine=$fine,returned_date='$returned_date' where user_id=$user_id and book_id=$book_id";
if(mysqli_query($con,$sql))
{
echo '
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Returned book successfully.
</div>
';
}
else
{
echo '
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong>Error to Return a book.
</div>
';
}
}
?>
<?php
include('db.php');
//$sql3="select book.myimage as mi,book.id as bi,book.name as b,author.name as a,category.name as c from book inner join category on book.category_id=category.id inner join author on book.author_id=author.id where book.id=$id";
$bid=$_GET["book_id"];
$sql3="select * from book where id=$bid";
$result3=mysqli_query($con,$sql3);
$row12=mysqli_fetch_assoc($result3);

$uid=$_GET["user_id"];
$sql4="select * from user where id=$uid";
$result4=mysqli_query($con,$sql4);
$row13=mysqli_fetch_assoc($result4);

$sql5="select * from issue_book where user_id=$uid and book_id=$bid";
$result5=mysqli_query($con,$sql5);
$row14=mysqli_fetch_assoc($result5);
?>
<div class="card shadow-lg my-4">
<div class="card-header bg-info text-white">Issue book details</div>
<div class="card-body">
<h4 class="font-weight-normal">Student Details</h4><hr>
<table>
<tr>
    <td><b>Student ID :</b> <?=$row13["id"]?></td>
    <td><b>Student Name :</b> <?=$row13["name"]?></td>
</tr>
<tr>
    <td><b>Student Email :</b> <?=$row13["email"]?></td>
    <td><b>Student Mobile :</b> <?=$row13["mobile"]?></td>
</tr>
</table>
<h4 class="font-weight-normal">Book Details</h4><hr>
<table>
<tr>
    <td>
    <b>Book image :</b> <img src='<?=$row12["myimage"]?>' height="100" width="80">
</td>
<td>
    <p><b>Book name :</b> <?=$row12["name"]?></p>
    <p><b>ISBN :</b> <?=$row12["isbn"]?></p>
    <p><b>Issue Date :</b> <?=$row14["issue_date"]?></p>
    <p><b>Returned Date :</b> <?=$row14["returned_date"]?></p>
   </td>
</tr>
</table>
<form action="" method="post">
  <div class="form-group">
    <label for="amt">Fine (in INR):</label>
    <input type="number" class="form-control" placeholder="Enter fine amount" value="<?=$row14['fine']?>" name="amount" id="amt" required>
  </div>
  <button type="submit" class="btn btn-info" name="return_book">Return book</button>
</form>

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