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
                <h1>Pending Updates</h1>

                <?php

                    $sql = "SELECT * FROM policyupdates JOIN users on policyupdates.userid=users.id JOIN policies ON policyupdates.policyid=policies.id where policyupdates.changestatus='PENDING';";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        if ($row["typeofupdate"] == "DELETE") {

                            echo '<div class="card">
                            <div class="card-header">
                                ' . $row['username'] . ' - REQUEST TO DELETE FILE' .
                            '</div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Download PDF</a>
                            </div>
                            </div>';
                        }



                        /*if($_SESSION["id"] == $row["id"]) {
                            echo "<td>
                                <a class='btn btn-primary' href='userEdit.php?id=" . $row["id"] . "'>Edit</a>
                            </td>
                            ";
                        } else {

                        echo "<td>

                        <div class='btn-group'>
                            <a class='btn btn-primary' href='userEdit.php?id=" . $row["id"] . "'>Edit</a>
    
                            <a class='btn btn-danger' href='userDelete.php?id=" . $row["id"] . "'>Delete</a>
                        </div>
                        </td>
                        ";
                        }*/


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