<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Books</title>
</head>
<body>
    <?php
    $id=$_GET["id"];
    include('db.php');
    $sql="delete from book where id=$id";
    if(mysqli_query($con,$sql))
    {
        echo "<script>window.location.replace('manage_book.php');</script>";
    }
    else
    {
        echo "<script>window.location.replace('manage_book.php');</script>";
    }
        ?>
   
</body>
</html>