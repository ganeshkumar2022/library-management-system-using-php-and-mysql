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
<h4 class="mt-4">ADD BOOK</h4>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if(isset($_POST["add_book"]))
{
  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
$name=trim($_POST["name"]);
$category_id=trim($_POST["category_id"]);
$author_id=trim($_POST["author_id"]);
$isbn=trim($_POST["isbn"]);
$price=trim($_POST["price"]);
//$myimage=trim($_POST["myimage"]);
date_default_timezone_set("Asia/Kolkata");
$date=date("d-m-Y h:i:sa l");
include('db.php');
if (move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file)) {
$sql="insert into book values (null,'$name','$category_id','$author_id','$isbn','$price','$target_file','$date','$date')";
if(mysqli_query($con,$sql))
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Book added successfully.
</div>
    <?php
}
else
{
    ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to add Book.
</div>
    <?php
}
}
else
{
?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Error to add Book.
</div>
<?php  
}
}
?>
<div class="card shadow-lg">
<div class="card-header bg-success text-white">Book info</div>
<div class="card-body">
<form name="myform" action="" method="post" onsubmit="return check()" autocomplete="off" enctype="multipart/form-data">
<div class="form-row">
    <div class="col">
      <label for="book">Book name<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="book" placeholder="Enter Book name" name="name" required>
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
                <option value='<?php echo $row["id"]; ?>'><?php echo $row["name"]; ?></option>
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
    <label for="sel1">Author:</label>
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
                <option value='<?php echo $row["id"]; ?>'><?php echo $row["name"]; ?></option>
            <?php
        }
    }
    ?>
  </select>
    </div>
    <div class="col">
    <label>ISBN Number<span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Enter ISBN number" name="isbn" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label>Price<span class="text-danger">*</span></label>
      <input type="number" class="form-control" id="email" placeholder="Enter price" name="price" required>
    </div>
    <div class="col">
    <label>Book picture<span class="text-danger">*</span></label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="myimage" required>
    <label class="custom-file-label" for="customFile">Choose file</label>
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
    <input type="submit" name="add_book" class="btn btn-success" value="Add Book">
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