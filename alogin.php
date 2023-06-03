<?php
session_start();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<script>
function validate_form()
{
    var name=document.myform.name.value;
    var password=document.myform.password.value;
    var a=true;
    if(name==null || name=="")
    {
        document.getElementById("nameErr").innerHTML="* name field is required";
        a=false;
    }
    if(password==null || password=="")
    {
        document.getElementById("passErr").innerHTML="* password field is required";
        a=false;
    }
    return a;
    
}
</script>
<div class="container my-4">
<div class="row">
<div class="col-md-6 offset-md-3">
<h5 class="text-uppercase text-center">Admin login form</h5>
<div class="card mt-4">
  <div class="card-header bg-success text-white">LOGIN FORM</div>
  <div class="card-body">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" method="post" name="myform" onsubmit="return validate_form()">
  <div class="form-group">
    <label for="email">User name:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter username" id="email">
    <span class="text-danger" id="nameErr"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
    <span class="text-danger" id="passErr"></span>
  </div>
<div class="form-group">
    <input type="checkbox" id="che"> Show your password
</div>
  <button type="submit" class="btn btn-success btn-block" name="login">LOGIN</button>
</form>
<script type="text/javascript">
$("#che").click(function(){
if($(this).prop("checked"))
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
</div>

</div>

</div>
</div>
<div class="container-fluid" style="position:fixed;bottom:0;">
<div class="row bg-dark p-4 text-white text-right">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>

</body>
</html>
<?php
if(isset($_POST["login"]))
{
$name=$_POST["name"];
$a=array("<",">","/");
$name=str_replace($a,"",$name);
    
$password=$_POST["password"];
$b=array("<",">","/");
$password=str_replace($b,"",$password);


$con=mysqli_connect("localhost","root","","library");
$sql="select * from admin where name='$name' and password='$password'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_assoc($result);
$id=$row["id"];
$_SESSION["aid"]=$id;
echo "<script>window.location.replace('admin/dashboard.php');</script>";
}
else
{
   
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Name or Password error!',
      })
    </script>
    ";  
}

}

?>