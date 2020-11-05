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

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {
    /* Use SMTP. */
$mail->isSMTP();

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
   $mail->setFrom('njdcf.website@gmail.com', 'B P');

   /* Add a recipient. */
   $mail->addAddress('bpetcaugh@gmail.com', 'Me');

   /* Set the subject. */
   $mail->Subject = 'Time to Party';

   /* Set the mail message body. */
   $mail->Body = 'There is a great disturbance in the Force.';

   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}

// if(isset($_GET['policy_name']) )
// {
//   $n = $_GET['policy_name'];
// 	echo $n;
// }

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
				<h1>Contact Form</h1>

        <form  method="post" action="emailsend.php">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>

    <div class="form-group col-md-4">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Name">
    </div>

    <div class="form-group col-md-4">
      <label for="inputContactNumber">Contact Number</label>
      <input type="text" class="form-control" id="inputContactNumber" placeholder="">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Working Title</label>
      <input type="text" class="form-control" id="inputTitle" placeholder="Title">
    </div>

    <div class="form-group col-md-6">
      <label for="inputLocation">Job Location</label>
      <input type="text" class="form-control" id="inputLocation" placeholder="Location">
    </div>
  </div>
<!--
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>-->
  <button type="submit" class="btn btn-primary">Send</button>
</form>

<!-- ********************************************************************** -->

<form method="post" action="emailsend.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input style="width:30%;" name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your Name</label>
    <textarea style="width:30%;" name="personName" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
  </div>
  <div class="form-group" style="width:30%;">
    <label for="exampleFormControlSelect1">Inquiry Type</label>
    <select name="inquiryType" class="form-control" id="exampleFormControlSelect1">
      <option value="Policy">Policy</option>
      <option value="Regulation">Regulation</option>
      <option value="Form">Form</option>
    </select>
  </div>
  <div class="form-group" style="width:30%;">
    <label for="exampleFormControlSelect2">Policy Creating, Revising, Obsoleting Request</label>
    <select name="requestType" class="form-control" id="exampleFormControlSelect2">
      <option value="CreateNew">Create New Policy or Form</option>
      <option value="Revise">Revise Policy or Form</option>
      <option value="Obsolete">Obsolete Policy or Form</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea2">Policy Name</label>
    <textarea style="width:30%;" name="policyName" class="form-control" id="exampleFormControlTextarea2" rows="1"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea3">Reason For Email</label>
    <textarea name="reason" class="form-control" id="exampleFormControlTextarea3" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
				
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