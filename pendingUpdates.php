<?php include("connect.php"); ?>
<?php
    require("./functions.php");
    checkSession();

    //Change database because of button presses on site
    if(isset($_GET['mainid'])){
        //Handle approval status 
        $adminuser = getUserInfo($_SESSION['id'], "username");
        update_checklist_approval($_GET['mainid'],$_GET['decision'],$adminuser);

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
						</div>
                    </nav>
					<img src="./res/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>Pending Approval</h1>

<div style="margin-top: 30px;">
    
                <?php

                    $sql = "SELECT policyupdates.id AS mainid, policyupdates.userid AS userid, users.username, policyupdates.typeofupdate, policyupdates.comments, date_format(policyupdates.dateCreated, '%h:%i %p, %m/%d/%Y') AS dateCreated , policies.file_name AS thisFile, policies.policy_name AS policyName 
                    FROM policyupdates 
                    JOIN users on policyupdates.userid=users.id 
                    JOIN policies ON policyupdates.policyid=policies.file_name 
                    where policyupdates.changestatus='PENDING' 
                    ORDER BY dateCreated DESC;";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        if ($row["typeofupdate"] == "DELETE") {

                            echo "<div class='card'>";
                            echo "    <div class='card-header'>". $row['username'] . " - Request to Delete File <div style='float: right;'>" . $row["dateCreated"] . "</div></div>";
                            echo "    <div class='card-body'>";
                            echo "        <h5 class='card-title'>" . $row["thisFile"] . ": " .$row["policyName"] . "</h5>";
                            echo "        <p class='card-text'><b>Comments:</b> " . $row["comments"] . "</p>";
                            echo "        <a href='pendingUpdates.php?mainid=" . $row['mainid']. "&decision=APPROVED&userid=" . $row['userid'] . "' class='btn btn-success'>Approved</a>";
                            echo "        <a href='pendingUpdates.php?mainid=" . $row['mainid']. "&decision=DENIED&userid=" . $row['userid'] . "' class='btn btn-danger'>Denied</a>";
                            echo "    </div></div><br>";
                
                        }

                    echo "</tr>";

                    }
                    } else {
                    echo "Currently No Pending Changes";
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