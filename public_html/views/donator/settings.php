<?php
    require($_SERVER['DOCUMENT_ROOT'] .'/clothbox/public_html/views/donator/donator_header.php');
    
    if(isset($_SESSION['role']) && $_SESSION['role']==='donator' && isset($_SESSION['username'])):
        if(isset($_SESSION['mismatch'])):
?>
    <div class="alert alert-danger .alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Password Mismatch!</strong>Your old password doesn't match.
    </div>
<?php 
endif; 
unset($_SESSION['mismatch']);
?>

<div class="container-fluid">
    <section class="container">
        <div class="container-page">				
            <form method="post" action="\clothbox\public_html\controller\donatorSettingsController.php" id="Logout">
                <div class="col-md-6">
                    <h3 class="dark-grey">Change Password</h3>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Old Password</label>
                            <input type="password" name="oldpass" class="form-control" id="oldpass" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <br><br>
                            <div id="oldpassalert"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>New Password</label>
                            <input type="password" name="pass1" class="form-control" id="pass1" required onkeyup="validatePass();">
                        </div>
                    </div>
                    <div class="row">    
                        <div class="form-group col-lg-6">
                            <label>Repeat New Password</label>
                            <input type="password" name="pass2" class="form-control" id="pass2" required onkeyup="checkPass();">
                        </div>
                        <div class="form-group col-lg-6">
                            <br><br>
                            <div id="pass2alert"></div>
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="connect">				
                    <div class="row">    
                        <div class="form-group col-lg-6">                
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </div>  
            </form>
        </div>
    </section>
</div>
<?php endif; ?>
</body>
</html>