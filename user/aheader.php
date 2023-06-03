<?php
session_start();
if(!isset($_SESSION["uid"]))
{
header("Location:../index.php");
}
?>
<nav class="navbar navbar-expand-md bg-white" style="color:black;border-bottom:2px solid black;">
  <!-- Brand -->
  <a class="navbar-brand" href="dashboard.php"><img src="../images/logo.png" style="height:80px;"></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav" style="margin-left:150px;right:10px;position:absolute;">
      <li class="nav-item">
        <a class="nav-link text-dark" href="dashboard.php">DASHBOARD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="issue.php">ISSUED BOOKS</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
       ACCOUNT
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="myprofile.php">MY PROFILE</a>
        <a class="dropdown-item" href="change_password.php">CHANGE PASSWORD</a>
      </div>
    </li>
      <li class="nav-item">
        <a class="nav-link btn btn-primary text-white px-4 ml-2" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>