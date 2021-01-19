<?php 
    include("connect.php");
    require("functions.php");
    checkSession();

    //Redirect to user pages
    // if ($_POST['action'] && $_POST['id']) {
    //     if ($_POST['action'] == 'Edit') {
    //         newUrl = 'Location: ' . 'userEdit.php?id=' . $_POST['id'];
    //         header(newUrl);
    //     } 
    //     if ($_POST['action'] == 'Delete') {
    //         newUrl = 'Location: ' . 'userDelete.php?id=' . $_POST['id'];
    //         header(newUrl);
    //     } 
    // }

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
                <h1>Current Users</h1>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Username</th>
                        <th scope="col">User Added</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Office</th>  
                        <th scope="col">Cost Code</th>                     
                        <th scope="col">Access Level</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php

                    $sql = "SELECT * FROM users WHERE deleted=0";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $timeStamp = $row['dateCreated'];
                        $timeStamp = date( "m/d/Y", strtotime($timeStamp));

                        echo "<tr>";
                        echo "<th scope='row'>" . $row["username"]. "</th>";
                        echo "<td>" . $timeStamp  . "</td>";
                        echo "<td>" . $row["firstname"]  . "</td>";
                        echo "<td>" . $row["lastname"]  . "</td>";
                        echo "<td>" . $row["email"]  . "</td>";
                        echo "<td>" . $row["office"]  . "</td>";
                        echo "<td>" . $row["costCode"]  . "</td>";
                        if ($row["accessLevel"] == 'root') {
                            echo "<td>admin</td>";
                        } else {
                            echo "<td>" . $row["accessLevel"]. "</td>";                      
                        }


                        if($_SESSION["id"] == $row["id"]) {
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
                        }


                    echo "</tr>";

                    }
                    } else {
                    echo "Currently No Users In the Database";
                    }

                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>

                <a class="btn btn-primary" href="userAdd.php">Add New User</a>

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