<?php 
    include("connect.php");
    require("./functions.php");
    checkSession();
?>

<!DOCTYPE html>
<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<?php include("adminSidebar.php"); ?>

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
                <h1>Missing Files</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">FileName</th>
                            <th scope="col">File On Server</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php

                    $missFileCounter = 0;
                    $sql = "SELECT * FROM policies";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $temp_file = "./res/policies/". $row["file_name"] .".pdf";
                        if (!file_exists($temp_file)) {
                            $missFileCounter++;
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["category"]. "</th>";
                        if ($row["file_name"] == 'none') {
                            echo "<td>No File Name Given</td>";
                        } else {
                            echo "<td>" . $row["file_name"]  . ".pdf</td>";
                        }

                        if (file_exists($temp_file)) {
                            echo "<td> Yes </td>";
                        } else {

                            echo "<td style='background: red; color: #fff;'> No </td>";
                        }

                        echo "</tr>";
                        }

                    }
                    } else {
                    echo "Currently No Files In the Database";
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>

                <p>There are currently <?php echo $missFileCounter;?> missing files in this database.</p>

            </div>
        </div>
    </div>

			<!-- javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="NJPage.js"></script>

</body>
</html>