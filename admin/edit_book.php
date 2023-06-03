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
<h4 class="mt-4">EDIT BOOK</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
$id=$_GET["id"];
include('db.php');

//$sql3="select book.myimage as mi,book.id as bi,book.name as b,author.name as a,category.name as c from book inner join category on book.category_id=category.id inner join author on book.author_id=author.id where book.id=$id";
$sql3="select * from book where id=$id";
$result3=mysqli_query($con,$sql3);
$row12=mysqli_fetch_assoc($result3);
if(isset($_POST["edit_book"]))
{
  $name=$_POST["name"];
  $category_id=$_POST["category_id"];
  $author_id=$_POST["author_id"];
  $isbn=$_POST["isbn"];
  $price=$_POST["price"];
  $target_dir="uploads/";
  $target_file=$target_dir.basename($_FILES["myimage"]["name"]);
  $ta=basename($_FILES["myimage"]["name"]);
  date_default_timezone_set("Asia/Kolkata");
  $date=date("d-m-Y h:i:sa l");
  $sql5="update book set name='$name',category_id='$category_id',author_id='$author_id',isbn='$isbn',
  price='$price',update_time='$date' where id=$id";
  if(mysqli_query($con,$sql5))
  {
    header("Refresh:0");
  }
  if($ta!=null)
  {
    if(move_uploaded_file($_FILES["myimage"]["tmp_name"],$target_file))
    {
      $sql4="update book set myimage='$target_file' where id=$id";
      if(mysqli_query($con,$sql4))
      {
        header("Refresh:0");
      }

    }
  }
  
  
}
?>
<div class="card shadow-lg">
<div class="card-header bg-success text-white">Book info</div>
<div class="card-body">

<form name="myform" action="" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="form-row">
    <div class="col">
      <label for="book">Book name<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="book" placeholder="Enter Book name" name="name" value="<?php echo $row12["name"]; ?>" required>
      <span class="text-danger" id="nameErr"></span>
    </div>
    <div class="col">
    <label for="sel1">Category<span class="text-danger">*</span></label>
  <select class="form-control" id="sel1" name="category_id" required>
    <option value="">-------CHOOSE CATEGORY-------</option>
    <?php
    include('db.php');
    $sql="select * from category";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            ?>
                <option value='<?php echo $row["id"]; ?>' <?php if($row12["category_id"]==$row["id"]) { echo "selected"; } ?>><?php echo $row["name"]; ?></option>
            <?php
        }
    }
    ?>
  </select>
  <span class="text-danger" id="categoryErr"></span>
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label for="sel1">Author<span class="text-danger">*</span></label>
  <select class="form-control" id="sel1" name="author_id" required>
    <option value="">-------CHOOSE AUTHOR--------</option>
    <?php
    include('db.php');
    $sql="select * from author";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            ?>
                <option value='<?php echo $row["id"]; ?>' <?php if($row12["author_id"]==$row["id"]) { echo "selected"; } ?>><?php echo $row["name"]; ?></option>
            <?php
        }
    }
    ?>
  </select>
    </div>
    <div class="col">
    <label>ISBN Number<span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Enter ISBN number" name="isbn" required value="<?php echo $row12["isbn"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label>Price<span class="text-danger">*</span></label>
      <input type="number" class="form-control" id="email" placeholder="Enter price" name="price" required value="<?php echo $row12["price"]; ?>">
    </div>
    <div class="col">
    <label>Book picture<span class="text-danger">*</span></label>
    <img src="<?php echo $row12["myimage"]; ?>" height="100" width="80"><label for="mia">Change image</label>
    <input type="file" name="myimage" id="mia" style="display:none;">
  </div>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
    </div>
  </div>
<div class="form-group mt-2">
    <input type="submit" name="edit_book" class=" ml-4 btn btn-success" value="edit Book">
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