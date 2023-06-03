<nav class="navbar navbar-expand-md bg-white" style="color:black;border-bottom:2px solid black;">
  <!-- Brand -->
  <a class="navbar-brand" href="dashboard.php"><img src="../images/logo.png" style="height:80px;"></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav" style="margin-left:0px;">
      <li class="nav-item">
        <a class="nav-link text-dark" href="dashboard.php">DASHBOARD</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
       CATEGORIES
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_category.php">ADD CATEGORY</a>
        <a class="dropdown-item" href="manage_category.php">MANAGE CATEGORIES</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
       AUTHORS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_author.php">ADD AUTHOR</a>
        <a class="dropdown-item" href="manage_author.php">MANAGE AUTHORS</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
       BOOK
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_book.php">ADD BOOK</a>
        <a class="dropdown-item" href="manage_book.php">MANAGE BOOKS</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
       ISSUE BOOKS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="issue.php">ISSUE NEW BOOK</a>
        <a class="dropdown-item" href="manage_issue.php">MANAGE ISSUED BOOKS</a>
      </div>
    </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="reg_students.php">REG STUDENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="change_password.php">CHANGE PASSWORD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="import_export.php">IMPORT / EXPORT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-primary text-white px-4 ml-2" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>