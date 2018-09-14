<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cloth Box</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=<?php echo '\clothbox\public_html\css\style.css'?>>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!--script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="\clothbox\public_html\js\main.js?v=001"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<?php 
    session_start();
    if(isset($_SESSION['role']) && $_SESSION['role']==='donator'):
?>
<body>
<!-- -->
<nav class="navbar navbar-inverse sticky" id="topNav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href=<?php echo '\clothbox\public_html\views\donator\donator.php'?>>Cloth Box</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="\clothbox\public_html\views\donator\donator.php">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Campaigns</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
      //session_start();
            if(!isset($_SESSION['username'])):
      ?>
       <li><a href='\clothbox\public_html\\views\signup.php'><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
       <li><a href='\clothbox\public_html\\views\login.php'><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
      <?php else: ?>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['fname']." ".$_SESSION['lname']?><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="\clothbox\public_html\views\donator\profile.php">Profile</a></li>
                <li><a href="\clothbox\public_html\views\donator\donations.php">Donations</a></li>
                <li><a href="\clothbox\public_html\views\donator\settings.php">Security Settings</a></li>
                <!--li><a href="#"></a></li-->
            </ul>
        </li>
        <li><a href='\clothbox\public_html\controller\logoutController.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <?php endif; ?>
        ?>
      </ul>
  </div>
</nav>
<?php
    endif;
?>  

<!--div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div-->