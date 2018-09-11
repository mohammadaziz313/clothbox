<?php
    require($_SERVER['DOCUMENT_ROOT'] .'/clothbox/public_html/views/header.php');
?>

<div class="container-fluid">
    <section class="container">
		<div class="container-page">				
            <form method="post" action="\clothbox\public_html\controller\signupController.php" id="Logout">
                <div class="col-md-6">
				    <h3 class="dark-grey">Registration</h3>
                        <div class="form-group col-lg-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" required onkeyup="validateName();">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" required onkeyup="validateName();">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" name="pass1" class="form-control" id="pass1" required onkeyup="validatePass();">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Repeat Password</label>
                            <input type="password" name="pass2" class="form-control" id="pass2" required onkeyup="checkPass();">
                        </div>
                                        
                        <div class="form-group col-lg-6">
                            <label>Email Address</label>
                            <input type="email" name="email1" class="form-control" id="email1" required>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label>Repeat Email Address</label>
                            <input type="email" name="email2" class="form-control" id="email2" required onkeyup="checkEmail();">
                        </div>			
                        
                        <div class="form-group col-lg-4">
                            <label>Type Of Account</label>
                        </div>

                        <div class="form-group col-lg-4">
                            <input type="checkbox" class="checkbox" value="donator" id="check1" name="check1" checked onclick="isChecked();"/>Donator
                        </div>

                        <div class="form-group col-lg-4">
                        <input type="checkbox" class="checkbox" value="collector" id="check2" name="check2" onclick="isChecked();"/>Collector
                        </div>
                        <input type="hidden" id="status" name="status" value="connect">
                        <!--div class="col-sm-6">
                            <input type="checkbox" class="checkbox" />Send notifications to this email
                        </div-->				
                </div>
            
                <div class="col-md-6">
                    <h3 class="dark-grey">Terms and Conditions</h3>
                    <p>
                        By clicking on "Register" you agree to The Company's' Terms and Conditions
                    </p>
                    <p>
                        Will be updated soon.
                    </p>
                    <!--p>
                        Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                    </p-->
                    <!--p>
                        Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
                    </p-->
                    
                    <button type="submit" class="btn btn-primary">Register</button>    
			    </div>
            </form>
		</div>
	</section>
</div>
</body>
</html>