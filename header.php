<?php
    include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Management System</title>
  <?php include 'links.php' ?>
</head>
<style>
    body{
        background: linear-gradient(to right, #178ca3 0%,  #0a9da8 0%, #68ddfa 100%);
    }
    nav {
        font-size: 1.1rem;
        align-items: center;
    }
    nav a{
      padding-left: 3%;
    }
    .logo img{
        border: 0px solid white;
        border-radius: 50px;
    }
</style>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="add_employee.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="show_employees.php">View Employees</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_employee.php">Add New Employee</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <span class="navbar-text text-white my-2 my-lg-0" style="font-size: 1.2rem;">
            Welcome&nbsp; <strong> Admin </strong>
            <span class="logo"><img src="./images/admin.png" class='img-thumbnail' width="40px"></span>            
        </span>
      </li>
        
      <li class="nav-item px-3 py-2">
        <button class="btn btn-outline-danger" type="submit">
          <a style="color: #fff; text-decoration: none;" href="logout.php">Logout</a>
        </button>
      </li>
    </ul>
  </div> 
</nav>