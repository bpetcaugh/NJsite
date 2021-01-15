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
				<h1>Log Update Results</h1>
				<br /><br />

                <?php
					//echo "<p>" . $_POST['inquiryRadios'] . "</p>";

                    /*
                    Find policies within the past 30 days.
                    
                    SELECT *
                    FROM `policyupdates`
                    WHERE dateCreated >= DATE_ADD(CURDATE(), INTERVAL -30 DAY);
                    */

				?>
				
				<?php

					$sql = "SELECT policyupdates.id AS mainid, policyupdates.changestatus AS changestatus, policyupdates.userid AS userid, users.username, policyupdates.typeofupdate, policyupdates.comments, date_format(policyupdates.dateCreated, '%h:%i %p, %m/%d/%Y') AS dateCreated , policies.file_name AS thisFile, policies.policy_name AS policyName, date_format(policyupdates.updatedate, '%m/%d/%Y') AS dateChanged
					FROM policyupdates 
					JOIN users on policyupdates.userid=users.id 
					JOIN policies ON policyupdates.policyid=policies.file_name 
					where policyupdates.changestatus='APPROVED' OR  policyupdates.changestatus='DENIED'
					ORDER BY dateCreated DESC;";

					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {

						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {

							echo "<div class='card'>";
                            echo "    <div class='card-header'>". $row['username'] . " - Request to Delete File <div style='float: right;'>" . $row["dateCreated"] . "</div></div>";
                            echo "    <div class='card-body'>";
							if ($row["changestatus"] == "APPROVED") {
								echo "<div class='btn btn-success' style='position: relative; float:right;'>Approved: " . $row["dateChanged"] . "</div>";
							} else if ($row["changestatus"] == "DENIED") {
								echo "<div class='btn btn-danger' style='position: relative; float:right;'>Denied: " . $row["dateChanged"] . " </div>";
							}
                            echo "        <h5 class='card-title'>" . $row["thisFile"] . ": " .$row["policyName"] . "</h5>";
							echo "        <p class='card-text'><b>Comments:</b> " . $row["comments"] . "</p>";
							
                            echo "    </div></div><br>";

						}
					}
					else {
						echo "No Past Requests";
					}

					mysqli_close($conn);
					?>


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