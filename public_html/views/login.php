<?php
    require_once($_SERVER['DOCUMENT_ROOT'] .'/clothbox/public_html/views/header.php');
?>

<body id="LoginForm">
    <div class="container">
        <h1 class="form-heading">login Form</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Login into ClothBox</h2>
                    <p>Please enter your email and password</p>
                </div>
                <form id="Login" method="Post" action="/clothbox/public_html/controller/loginController.php">
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
                    </div>
                    <div class="forgot">
                        <a href="reset.html">Forgot password?</a>
                    </div>
                    <input type="hidden" name="status" id="status" value="connect">
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
