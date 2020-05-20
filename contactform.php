<?php include("connect.php"); ?>
<?php

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
    <label for="exampleFormControlTextarea3">Policy Name</label>
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