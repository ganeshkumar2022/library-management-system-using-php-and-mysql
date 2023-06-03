<?php
session_start();
if(isset($_COOKIE["username"]))
{
header("Location:user/dashboard.php");
exit;
}
?>
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
<div class="col-md-6">
<h5 class="text-uppercase text-center">user login form</h5>
<div class="card mt-4">
  <div class="card-header bg-primary text-white">LOGIN FORM</div>
  <div class="card-body">
<?php
if(isset($_POST["login"]))
{
  $email=$_POST["email"];
  $password=$_POST["password"];
  $con=mysqli_connect("localhost","root","","library");
  //include('db.php');
  $sql="select * from user where email='$email' and password='$password'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
$row=mysqli_fetch_assoc($result);
$id=$row["id"];
$_SESSION["uid"]=$id;
setcookie('username',$id,time()+3600,"/");
header("Location:user/dashboard.php");
exit;
  }
  else
  {
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email or Password error!',
      })
    </script>
    ";  
}
}

?>
  <form action="" method="post" autocomplete="off">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" required>
  </div>
  <input type="checkbox" id="che"> Show password <br>
  <a href="forgot_password.php" class="text-decoration-none">forgot password</a><br/><br/>
  <button type="submit" class="btn btn-primary btn-block" name="login">LOGIN</button>
  <center>
  <a href="signup.php" class="text-decoration-none text-dark">you have not account yet. registered first?</a>
</center>
</form>
  </div>
<script type="text/javascript">
  $("#che").click(function(){
    if($(this).prop('checked'))
    {
      $("#pwd").attr("type","text");
    }
    else
    {
      $("#pwd").attr("type","password");
    }
  });
</script>
</div>
</div>
<div class="col-md-6">
<div id="slider">
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