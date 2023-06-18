<?php
session_start();
if (isset($_SESSION["Id"])) {
    header("Location: home.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="bs-example elective_path_navtabs">
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#login" class="nav-link active" id="v-pills-nav-batches" data-toggle="tab">Login</a>
                </li>
                <li class="nav-item">
                    <a href="#signup" class="nav-link" id="v-pills-nav-electivepaths" data-toggle="tab">Sign-Up</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="login" class="tab-pane fade show active">
                    <?php echo loginhtml(); ?>
                </div>
                <div id="signup" class="tab-pane fade">
                    <?php echo signuphtml(); ?>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

function loginhtml() {
    $loginpage_html = '
        <div class="signup-form">
            <form action="process.php" method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <p class="hint-text">Enter Login Details</p>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
                </div>
            </form>
        </div>';
    return $loginpage_html;
}

function signuphtml() {
    include_once 'lib.php';
    $countryArray = countryArray();

    $signup_html = '

<div class="signup-form">
    <form action="signupprocess.php" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
        <div class="form-group">
			<div class="row">
                        <span style="margin-left: 20px; margin-top: 8px;"> Select Country:</span>
                         <select id="country" name="country" class="country" style="margin-left: 5px;">';
                        $defaultCountry = "IN";
                        foreach ($countryArray as $code => $country) {
                        $countryName = ucwords(strtolower($country["name"])); // Making it look good
                        $signup_html .= "<option value='" . $code . "' " . (($code == strtoupper($defaultCountry)) ? "selected" : "") . ">" . $countryName . "</option>";
                        }
                       $signup_html .= '</select>
 		      <div class="col"><input type="text" class="form-control" name="state" placeholder="State" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="city" placeholder="City" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="pincode" placeholder="Pincode" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
                        <span style="margin-left: 20px; margin-top: 8px;"> Select ISD Code:</span>
                         <select id="isd" name="isd" class="isd" style="margin-left: 5px;">';
                     foreach ($countryArray as $code => $country) {
                          $countryName = ucwords(strtolower($country["name"])); // Making it look good
                          $signup_html .= "<option value='" . $code . "' " . (($code == strtoupper($defaultCountry)) ? "selected" : "") . ">" . $countryName . " (+" . $country["code"] . ")</option>";
                            }
                          $signup_html .= '</select>
				<div class="col"><input type="text" class="form-control" name="mobile" placeholder="Mobile number" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fax" placeholder="Fax" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="phone" placeholder="Phone" required="required"></div>
			</div>        	
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block" style="background-color: #5de1e4">Signup</button>
        </div>
    </form>
	
</div>';
    return $signup_html;
}
?>