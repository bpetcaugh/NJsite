<?php include("connect.php"); ?>
<?php
    require("./functions.php");
	checkSession();
	$fileset = false;
	
	if(isset($_POST['myFile']) )
	{
		$fileset = true;
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
				<?php 
				if ($_SESSION["setAccessLevel"]) {
					echo "<h1>DCF Policy Manuals - ADMINISTRATOR </h1>";
				} else {
					echo "<h1>DCF Policy Manuals - STANDARD USER </h1>";
				}
				?>

				<br /><br />
				<p>Welcome to the DCF Policy user dashboard.</p>
				<br />
				<h3>Site Modifications or Comments</h3>
				<p>This is a work-in-progress, so if you find anything that should be changed or modified, please contact the parties below:
				</p>
				<a href="mailto:bpetcaugh@holyghostprep.org?cc=Joseph.Pargola@dcf.nj.gov &subject=Possible%20Website%20Modification"> Contact bpetcaugh@holyghostprep.org (CC:Joseph.Pargola@dcf.nj.gov)</a>
				<br /><br />
				<br />
				<h3>Code Base</h3>
				<p>Here is the link to the GitHub code repo to be reviewed: <a href="https://github.com/bpetcaugh/NJsite">Github Link</a></p>
            </div>
        </div>
    </div>

			<!-- javascript libraries -->
<?php //include("./includes/jslibraries.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="NJPage.js"></script>

</body>
</html>