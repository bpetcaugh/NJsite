<?php include("connect.php"); ?>
<?php
    require("./functions.php");
	checkSession();
	$fileset = false;
	
	if(isset($_POST['myFile']) )
	{
		$fileset = true;
    }


    if(isset($_GET['finalId']) )
	{
        // sql to delete a record
    $sql = "UPDATE users
    SET deleted = 1
    WHERE id={$_GET['finalId']}";

    if (mysqli_query($conn, $sql)) {
        header('Location: userList.php');
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }

    mysqli_close($conn);
	
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
                <h1>Delete User</h1>
                
                <p>Are you sure you would like to delete the following user?</p>

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
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $idName = $_GET["id"];
                    $sql = "SELECT * FROM users where id={$idName}";
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
                        echo "<td>" . $row["accessLevel"]. "</td>";
                        echo "</tr>";
                        echo "</tbody>
                        </table>";

                        
                        echo "
                        <div class='btn-group'>
                            <a class='btn btn-danger' href='userDelete.php?finalId=" . $row["id"] . "'>Delete User</a>
                            <a class='btn btn-primary' href='userList.php'>Cancel</a>
                        </div>
                        ";

                    }
                    } else {
                    echo "Currently No Users In the Database";
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