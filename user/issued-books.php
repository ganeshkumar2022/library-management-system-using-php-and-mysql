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
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4 pb-3" style="border-bottom:2px solid lightgray;">MANAGE ISSUED BOOKS</h4>
<?php
include('db.php');
$sql="select book.myimage as mi,book.id as bi,book.name as b,author.name as a,book.isbn as isbn,category.name as c from book inner join category on book.category_id=category.id inner join author on book.author_id=author.id";
$result=mysqli_query($con,$sql);
?>
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header bg-danger text-white">Issued Books</div>
    <div class="card-body">
<div class="card-columns">
<?php 
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
$bid=$row["bi"];
$sql2="select * from issue_book where book_id=$bid and returned_date='Not returned yet'";
$result2=mysqli_query($con,$sql2);
        ?>
<div class="card" style="border:none;">
   <div class="card-body">
    <img src="../admin/<?=$row['mi']?>" height="150" width="100">
    <p><b><?=$row["b"]?></b><br><?=$row["c"]?><br><?=$row["a"]?><br><?=$row["isbn"]?><br>
<?php
if(mysqli_num_rows($result2)>0)
{
    echo "<span class='text-danger' style='font-size:14px;'>Books already issued</span>";
}
?>
</p>
   </div>
</div>
        <?php
    }
}
?>


</div>
    </div>
</div>
</div>

</div>
</div>
<div class="container-fluid">
<div class="row bg-dark p-4 text-white text-right mt-5">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
</body>
</html>