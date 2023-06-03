<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/style.css">
<style>
    #slider
    {
        height:500px;
        width:100%;
        background-image:url('images/img1.jfif');
        background-repeat:no-repeat;
        background-size:100% 100%;
        animation-name:example;
        animation-duration:10s;
        animation-iteration-count:infinite;
        animation-direction:alternate;
    }
    @keyframes example
    {
        0%
        {
            background-image:url('images/img1.jfif');
        }
        25%
        {
            background-image:url('images/img2.jfif');
        }
        50%
        {
            background-image:url('images/img3.jfif');
        }
        50%
        {
            background-image:url('images/img5.jfif');
        }
        100%
        {
            background-image:url('images/img4.jfif');
        }
    }
</style>
</head>
<body>
<?php
include('header.php');
?>
<div class="container my-4">
<div class="row">
<div class="col-md-6 offset-md-3">
<?php
if(isset($_POST["signup"]))
{
  include('db.php');
  $name=$_POST["name"];
  $mobile=$_POST["mobile"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $confirm_password=$_POST["confirm_password"];
  if($password==$confirm_password)
  {
    $sql3="select * from user where email='$email'";
    $result=mysqli_query($con,$sql3);
    if(mysqli_num_rows($result)>0)
    {
      echo "
      <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Email already exists!',
        })
      </script>
      ";  
    }
    else
    {
      $sql4="insert into user values (NULL,'$name','$mobile','$email','$password',NULL)";
      if(mysqli_query($con,$sql4))
      {
        echo "
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: 'Registered successfully',
          })
        </script>
        ";  
      }
      else
      {
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error to register!',
          })
        </script>
        ";  
      }
    }
  }
  else
  {
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Password and confirm password not match!',
      })
    </script>
    ";  
  }
}
?>
<h5 class="text-uppercase text-center">user signup form</h5>
<div class="card mt-4">
  <div class="card-header bg-danger text-white">SIGNUP FORM</div>
  <div class="card-body">
  <form action="" method="post" autocomplete="off">
  <div class="form-group">
    <label for="email">Fullname:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Mobile:</label>
    <input type="number" class="form-control" name="mobile" placeholder="Enter mobile" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" onfocusout="myfun(this.value)" required>
    <span id="demo"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password" id="pwd" required>
  </div>
  <button type="submit" class="btn btn-danger btn-block" name="signup">SIGNUP</button>
  <center>
  <a href="index.php" class="text-decoration-none text-dark">Already you have an account. Please login</a>
</center>
</form>
<script type="text/javascript">
function myfun(x)
{
if(x.length==0)
{
  document.getElementById("demo").innerHTML="";
}
else
{
const xhttp=new XMLHttpRequest();
xhttp.onload=function(){
  document.getElementById("demo").innerHTML=this.responseText;
}
xhttp.open("GET","check.php?email="+x);
xhttp.send();
}
}
</script>
  </div>
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
<?php

?>
</body>
</html>