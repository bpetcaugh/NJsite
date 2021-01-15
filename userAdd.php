<?php include("connect.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require './PHPMailer/Exception.php';

/* The main PHPMailer class. */
require './PHPMailer/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require './PHPMailer/SMTP.php';

?>
<?php
    require("./functions.php");
	checkSession();
	$fileset = false;
	
	if(isset($_POST['myFile']) )
	{
		$fileset = true;
    }

    if(isset($_POST['accessLevel']) )
	{
        $un = $_POST['userName'];
        $fn = $_POST['firstName'];
        $ln = $_POST['lastName'];
        $e = $_POST['email'];
        $o = $_POST['office'];
        $cc = $_POST['costCode'];
        $al = $_POST['accessLevel'];
        $p = $_POST['password'];



        $sql = "INSERT INTO users (username, password, firstname, lastname, email, office, costcode, accessLevel)
        VALUES ('{$un}', '{$p}','{$fn}', '{$ln}', '{$e}', '{$o}', '{$cc}', '{$al}')";

        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";

            setPassword($un,$p);

            //Send email
            

            //Email Status to display on site.
            $email_final_status = "Information submitted successfully.";

            //Variables from User Creation
            $email_input = $e;
            $name_input = $fn . " " . $ln;

            $email_body_full = "<html>
            
            <p>An account was created for you on the NJ DCF Policy website.</p>
            <p>Please log in with the credentials below. You will be prompted to reset your password to something more secure.</p>

            <p>Website URL: <a href='http://cs.holyghostprep.org/njdcf/'>http://cs.holyghostprep.org/njdcf/</a></p>
            <p><b>Username:</b> " . $un . "</p>
            <p><b>Password:</b> " . $p . "</p>

            </html>
            ";

            /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
            $mail = new PHPMailer(TRUE);

            /* Open the try/catch block. */
            try {
                /* Use SMTP. */
            $mail->isSMTP();
            $mail->isHTML(TRUE);

            /* Google (Gmail) SMTP server. */
            $mail->Host = 'smtp.gmail.com';

            /* SMTP port. */
            $mail->Port = 587;

            /* Set authentication. */
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            /* Username (email address). */
            $mail->Username = 'njdcf.website@gmail.com';

            /* Google account password. */
            $mail->Password = 'nj*dcf^8462';

            /* Set the mail sender. */
            $mail->setFrom('njdcf.website@gmail.com', $name_input);

            /* Add a recipient. (Who will the email be sent to?) */
            //$mail->addAddress('policy@dcf.nj.gov', 'NJ DCF');
            $mail->addAddress($email_input, $name_input);

            /* Set the subject. */
            $request_subject = 'Account Created on NJ DCF Website';
            $mail->Subject = $request_subject;

            /* Set the mail message body. */
            $mail->Body = $email_body_full;

            /* Finally send the mail. */
            $mail->send();
            }
            catch (Exception $e)
            {
            /* PHPMailer exception. */
            $e->errorMessage();
            $email_final_status = "<b>Error sending form:</b> " . $e;
            }
            catch (\Exception $e)
            {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            $e->getMessage();
            $email_final_status = "<b>Error sending form:</b> " . $e;
            }

            header('Location: userList.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        
    }
    


?>


<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<?php include("./includes/header.php"); ?>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<?php include("./includes/adminSidebar.php"); ?>

		<div id="content">
			<div class="header">
				<div class="row">
					<nav class="navbar">
						<div class="container-fluid">
							<button type="button" id="sidebarCollapse" class="navbar-btn">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!--<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
						-->
						</div>
                    </nav>
					<img src="./res/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				    <!--<h1 class="headerTitle">New Jersey</h1>-->
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>Add User</h1>
                
                <form class="needs-validation" action="userAdd.php" method="post" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="firstName" placeholder="First name"
                            required>
                            <div class="invalid-feedback">
                            Please provide a first name.
                        </div>

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" name="lastName" placeholder="Last name"
                            required>
                            <div class="invalid-feedback">
                            Please provide a last name.
                        </div>

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="validationCustomUsername" name="userName" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                            Please choose a username.
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" id="validationCustom03" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Office</label>
                        <input type="text" class="form-control" id="validationCustom04" name="office" placeholder="Office" required>
                        <div class="invalid-feedback">
                            Please provide a valid office.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Cost Code</label>
                        <input type="text" class="form-control" id="validationCustom05" name="costCode" placeholder="Cost Code" required>
                        <div class="invalid-feedback">
                            Please provide a valid cost code.
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Temporary Password</label>
                        <input type="password" class="form-control" id="validationCustom04" name="password" required>
                        <div class="invalid-feedback">
                            Please provide a temporary password to the user.
                        </div>
                        </div>        

                    </div>

                    <div class="form-group">

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="standard" name="accessLevel" value="standard" checked>
                        <label class="form-check-label" for="accessLevel">Standard</label>
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="admin" name="accessLevel" value="root">
                        <label class="form-check-label" for="accessLevel">Admin</label>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                    <a class="btn btn-primary" href="userList.php">Cancel</a>
                    </form>

            </div>
        </div>
    </div>

			<!-- javascript libraries -->
<?php //include("./includes/jslibraries.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="NJPage.js"></script>
<script>
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>

</body>
</html>