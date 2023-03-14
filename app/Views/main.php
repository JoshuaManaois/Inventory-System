<!DOCTYPE html>
<html lang="en">
<head>

  <title>Agri-Machineries Inventory System</title>
    <!-- Bosstrap and css-->
  <link rel="stylesheet" href="assets/css/main.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>






  

</head>

<body>

<?php
  // Start session
  session_start();
  include "user_db_control.php";
  // If the user is not logged in, redirect to the login page
  if (!isset($_SESSION['user_name'])) {
    header('Location: Login');
    exit();
  }

  // If the logout button is clicked, destroy the session and redirect to the login page
  if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: Login');
    exit();
  }
?>
<?php

if(isset($_SESSION['firstname'])) {
  $username = $_SESSION['firstname'];
} else {
  $username = "Guest";
}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="text-transform: capitalize;" value="<?php  echo '$firstname';    ?>"></a> <!-- Shows Account User -->
    </div>              
    <!-- NAV BAR LINKS -->
    <ul class="nav navbar-nav">
      <li class="active"> 
        <a href="#">Home</a>
      </li>
      <li>
        <a href="BranchA">Branch A</a>
      </li>
      <li>
        <a href="BranchB">Branch B</a>
      </li>
      <li>
        <a href="Accounts">Accounts</a>
      </li>
      <li>
        <form action="Generate_report" method="POST">
          <button type="submit" class="btn btn-default navbar-btn">Generate Report</button>
        </form>
      </li>
    </ul>
    
    <!-- Logout Button -->
    <ul class="nav navbar-nav navbar-right">
      <li>
        <form action="" method="POST">
          <input type="hidden" name="logout" value="true">
          <button type="submit" class="btn btn-default navbar-btn">Logout</button>
        </form>
      </li>
    </ul>
    
  </div>
</nav>


</body>
</html>
