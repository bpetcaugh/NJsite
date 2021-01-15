<?php include("connect.php"); ?>
<?php
    require("./functions.php");
    checkSession();

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
						</div>
                    </nav>
					<img src="./res/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>Log Updates</h1>

                <p>Choose a time frame below to see all updates from that period.</p>

                <form method="post" action="logUpdateResults.php">
                      <!-- Choose Time Frame -->
                    <div class="form-group col-md-3">
                        <p>Time Frame:</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios1" value="Thirty" checked>
                            <label class="form-check-label" for="inquiryRadios1">
                            Past 30 Days
                            </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios2" value="Ninety">
                        <label class="form-check-label" for="inquiryRadios2">
                            Past 3 Months
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios3" value="Year">
                        <label class="form-check-label" for="inquiryRadios3">
                            Past Year
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="inquiryRadios" id="inquiryRadios4" value="All">
                        <label class="form-check-label" for="inquiryRadios4">
                            All Changes
                        </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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

</body>
</html>