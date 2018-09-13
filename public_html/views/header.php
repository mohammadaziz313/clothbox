<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cloth Box</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=<?php echo '\clothbox\public_html\css\style.css'?>>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="\clothbox\public_html\js\main.js?v=001"></script>

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
<!-- -->
<nav class="navbar navbar-inverse sticky" id="topNav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href=<?php echo '\clothbox\index.php'?>>Cloth Box</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <!--li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li-->
      <li><a href="#">About Us</a></li>
      <li><a href="#">Campaigns</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
      session_start();
      if(!isset($_SESSION['username'])){
        echo "<li><a href='\clothbox\public_html\\views\signup.php'><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
        echo "<li><a href='\clothbox\public_html\\views\login.php'><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
      }
      else{
        echo "<li><a href='#'>".$_SESSION['username']."</a></li>";        
        echo "<li><a href='\clothbox\public_html\controller\logoutController.php'><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
      }
        ?>
      </ul>
  </div>
</nav>
  
<!--div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div-->