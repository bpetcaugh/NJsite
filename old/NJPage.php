<?php include("connect.php"); ?>

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
					<img src="NJ_DCF_Logo.png" alt="Holy Ghost Prep" style="width: 45%; height: 50%;" class="headerLogo">
				    <!--<h1 class="headerTitle">New Jersey</h1>-->
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
				<h1>DCF Policy Manuals</h1>
				<p>This section of the DCF web site is devoted to communicating the policies
				and procedures by which DCF provides its services. Policy and procedures are
				issued by the Department and its divisions and offices.  For more information
				on DCF's divisions and offices, please
				<a href="http://www.nj.gov/dcf/" target="_blank"><strong>click here.</strong></a>
				</p>

				<p><strong>Searching for Policies and Procedures</strong></p>

				<p>Each policy manual displays its content by Volume, Chapter, Subchapter,
				and Issuance. Use the menu on the left to navigate to issuances. Issuances
				are available in PDF format - simply click on the Adobe PDF icon to open,
				save, or print a policy.<br><br>Use the Search bar at the top right of any
				Policy Manual page to find a particular policy or procedure. For best results,
				select the search option that limits your query to the DCF Policy Manuals.
				<a href="Manual%20Search%20Instructions.pdf" target="_blank"><strong>Click here
				for detailed instructions on searching the DCF Policy Manuals.</strong></a>
				</p>

				<p><strong>Disclaimer</strong></p>

				<p>Please note that DCF Policy is subject to change without notice in order to
				reflect the Department's current practices.
				<a href="mailto:policy@dcf.nj.gov"><strong>Click here</strong></a>
				to contact the Office of Policy and Regulatory Development for information
				regarding specific policies.
				</p>

				<p><strong>Other Contacts</strong></p>

				<p>To report child abuse and neglect, call 1-877-NJ-ABUSE (1-877-652-2873).
				For more information on how and when to report child abuse and neglect,
				<a href="http://www.nj.gov/dcf/reporting/how/index.html" target="_blank"><strong>click here.</strong></a>
				</p>

				<p>For information, referral, and advocacy services, contact
				<a href="http://www.nj.gov/dcf/about/divisions/oa/" target=_blank border="0"><strong>the Office of Advocacy</strong></a>
				by calling 1-877-543-7864 or via email at
				<a href="mailto:askdcf@dcf.state.nj.us">askdcf@dcf.state.nj.us</a>.
				</p>

				<h2>List of Policies</h2>
				<p>Below is a comprehensive list of all policies:</p>
				<h3>Download Document Version</h3>
	            <div class="form-group policy-selection policy-download">

				
				
				
				
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
	<script src="NJadminpage.js"></script>
</body>
</html>