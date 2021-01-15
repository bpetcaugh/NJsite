<?php include("connect.php"); ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require './PHPMailer/Exception.php';

/* The main PHPMailer class. */
require './PHPMailer/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require './PHPMailer/SMTP.php';

//Email Status to display on site.
$email_final_status = "Information submitted successfully.";

//Variables from Contact Form
$email_input = $_POST["inputEmail"];
$name_input = $_POST["inputName"];
$num_input = $_POST["inputContactNumber"];
$title_input = $_POST["inputTitle"];
$location_input = $_POST["inputLocation"];
$inquiry_type_input = $_POST["inquiryRadios"];
$policy_type_input = $_POST["policyRadios"];
$policy_citation_input = $_POST["policyCite"];
$comments = $_POST["comments"];

$email_body_full = "<html>
 
<center>
<b>
<p>STATE OF NEW JERSEY</p>
<p>DEPARTMENT OF CHILDREN AND FAMILIES</p>
<p>Office of Policy & Regulatory Development</p>
<p>Policy and Regulatory Inquiry and Request Form</p>
</b>
<br />
<hr />
Use this form when inquiring about policy or regulation, or to request a new policy or form, or the revision or obsoleting of an
existing policy or form.
<hr />
</center>
<br />
<p><i><u><b>Inquirer Information:</b></u></i></p>
<p><b>Name Of Inquirer: </b>" . $name_input . "</p>
<p><b>Working Title: </b>" . $title_input . "</p>
<p><b>Job Location: </b>" . $location_input . "</p>
<p><b>Contact Number: </b>" . $num_input . "</p>
<p><b>Email: </b>" . $email_input . "</p>
<p><b>Date of Inquiry: </b>" . date("m/d/Y") . "</p>
<br />
<p><i><u><b>Inquiry Information:</b></u></i></p>
<p><b>Inquiry Type: </b>" . $inquiry_type_input . "</p>
<p><b>Policy/Regulation Citation: </b>" . $policy_citation_input . "</p>
<br />
<p><i><u><b>Policy Creating, Revising, Obsoleting Request:</b></u></i></p>
<p><b>Policy Request: </b>" . $policy_type_input . "</p>
<p><b>Policy Citation: </b>" . $policy_citation_input . "</p>
<br />
<p><i><u><b>Other Suggestions or Comments:</b></u></i></p><br />
" . $comments = $_POST["comments"] . "
<br>
<h1>Internal Use Only</h1>
<hr />
<p><b>Responder's Name:</b></p>
<p><b>Date Responded:</b></p>
<p><b>Date Closed:</b></p>
<p><b>Tracking No.:</b></p>
<hr />
<p><b>Office of Policy and Regulatory Development Resolution:</b></p>

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
   $mail->addAddress('policy@dcf.nj.gov', 'NJ DCF');
   $mail->addAddress($email_input, $name_input);

   /* Set the subject. */
   $request_subject = 'Request from Website: ' . $policy_type_input;
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


 ?>

<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<?php include("./includes/header.php"); ?>

	 <style>
		.panel-heading .accordion-toggle:after {
		    /* symbol for "opening" panels */
		    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
		    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
		    float: right;        /* adjust as needed */
		    color: grey;         /* adjust as needed */
		}
		.panel-heading .accordion-toggle.collapsed:after {
		    /* symbol for "collapsed" panels */
		    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
		}
		.listcontainer {
			width: 60%;
			background-color: beige;
		}

		.panel-title {
			background-color: gray;
		}

		.a {
			text-decoration: underline;
		}
	 </style>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<?php include("./includes/sidebar.php"); ?>

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
					<img src="./res/NJ_DCF_Logo.png" alt="Holy Ghost Prep" style="width: 45%; height: 50%;" class="headerLogo">
				    <!--<h1 class="headerTitle">New Jersey</h1>-->
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
				<?php require("functions.php"); showAlert(); ?>
        		<h1>Contact Form</h1>
        
        		<p><?php echo $email_final_status;?></p>
				
				</div>
			</div>
		</div>
	</div>


			<!-- Login modal -->
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Login</h5>
                            <button type="btn" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="panel mx-auto">
                                <h2 class="text-center">Login</h2>
                                <p class="text-center">Please enter your login credentials</p><hr>
                                <form method="post" action="loginAuth.php">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php //include("./includes/jslibraries.php"); ?>
			<!-- javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!--<script src="NJadminpage.js"></script>-->
</body>
</html>