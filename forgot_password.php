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
    input[type=email]:focus
    {
      background-color:#EEE8AA;
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
<h5 class="text-uppercase text-center">Forgot password</h5>
<div class="card mt-4">
  <div class="card-body">

  <form action="" method="post" autocomplete="off">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" required>
  </div>
  <span id="err" class="text-danger font-weight-bold"></span>
  <button type="submit" class="btn btn-primary float-right" name="send_email">Send Email</button>
  <center>
</center>
</form>
  </div>
</div>
</div>
<div class="col-md-6">
<div id="slider">
</div>
</div>
<?php
if(isset($_POST["send_email"]))
{
  $email=$_POST["email"];
  include('db.php');
  $sql="select * from user where email='$email'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
$row=mysqli_fetch_assoc($result);
$to=$email;
$subject="Password";
$message="Your password is ".$row["password"];
$headers="From:yourmail@gmail.com\r\n"; // give your email
mail($to,$subject,$message,$headers);
?>
<script>
Swal.fire({
  imageUrl: 'https://img.freepik.com/premium-vector/email-envelope-concept_34259-135.jpg',
  imageHeight:200,
  title: 'Email Sent Successfully',
  text: 'Please check your email. Please check your inbox',
  footer: '<a href="index.php">go to login page</a>'
})
</script>
<?php
  }
  else
  {
 echo "<script>document.getElementById('err').innerHTML='No user exist with this email...';</script>";
  }
}

?>
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