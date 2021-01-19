<?php include("connect.php"); ?>

<!DOCTYPE html>

<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

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
		<?php include("sidebar.php"); ?>

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
						</div>
                    </nav>
					<img src="./res/NJ_DCF_Logo.png" alt="Holy Ghost Prep" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
        <!-- Your code goes here -->
        <?php require("functions.php"); showAlert(); ?>
        <h1>Contact Form</h1>
        <p>Fill out all necessary information in the boxes provided, and submit the form below.</p>
        <br />
        <form  class="needs-validation" method="post" action="emailsend.php" novalidate>
          <h2>Personal Information</h2>
          <!-- ROW 1 -->
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
          Valid email address required.
      </div>
    </div>

    <div class="form-group col-md-4">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
      <div class="valid-feedback"></div>
      <div class="invalid-feedback">
          Name required.
      </div>
    </div>

    <div class="form-group col-md-4">
      <label for="inputContactNumber">Contact Number</label>
      <input type="text" class="form-control" id="inputContactNumber" name="inputContactNumber" placeholder="(XXX) XXX-XXXX" required>
      <div class="invalid-feedback">
          Contact Number required.
      </div>
    </div>
  </div>

  <!-- ROW 2 -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Working Title</label>
      <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title" required>
      <div class="invalid-feedback">
          Job title required.
      </div>
    </div>

    <div class="form-group col-md-6">
      <label for="inputLocation">Job Location</label>
      <input type="text" class="form-control" id="inputLocation" name="inputLocation" placeholder="Location" required>
      <div class="invalid-feedback">
          Location required.
      </div>
    </div>
  </div>

  <h2>Inquiry Information</h2>

  <!-- Inquiry Type Group -->
  <div class="form-group col-md-3">
  <p>Inquiry Type:</p>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios1" value="Policy" required>
    <label class="form-check-label" for="inquiryRadios1">
      Policy
    </label>
  </div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios2" value="Regulation">
  <label class="form-check-label" for="inquiryRadios2">
    Regulation
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios3" value="Form">
  <label class="form-check-label" for="inquiryRadios3">
    Form
  </label>
</div>
  </div>

<!-- Policy Type Group -->
<div class="form-group col-md-3">
<p>Policy Creating, Revising, Obsoleting Request:</p>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="policyRadios" id="policyRadios1" value="Create New Policy or Form" required>
  <label class="form-check-label" for="policyRadios1">
    Create New
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="policyRadios" id="policyRadios2" value="Revise Current Policy or Form">
  <label class="form-check-label" for="policyRadios2">
    Revise Current
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="policyRadios" id="policyRadios3" value="Obsolete Policy or Form">
  <label class="form-check-label" for="policyRadios3">
    Mark Obsolete
  </label>
</div>
  </div>

<!-- Final Form Rows-->
<div class="form-group">
    <label for="policyCite">Policy/Form/Regulation Citation or Title</label>
    <textarea style="width:30%;" name="policyCite" class="form-control" id="policyCite" rows="1" required></textarea>
  </div>

  <div class="form-group">
    <label for="suggestionsComments">Reason For Inquiry</label>
    <textarea name="comments" class="form-control" id="suggestionsComments" rows="4" required></textarea>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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
			<!-- javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>