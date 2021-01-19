<?php include("connect.php"); ?>
<?php

//Variables to be used later during the SQL query
$numOfResults = 0;
$keywords;

?>
<!DOCTYPE html>

<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

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
					<img src="./res/images/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
                <!-- Your code goes here -->
                <?php require("functions.php"); showAlert(); ?>
				<h1>Department of Children and Families Policy Manual</h1>

                <?php

                //Determine query from keywords and checkboxes

                if($_POST['keywordSearched']) {
                    $keywords = explode(" ",$_POST['keywordSearched']);
                }

                //Search kewyords if they exist
                if (count($keywords) > 0) {

                //Cut keywords up into individual search phrases, place in array for query.
                $keywordSearchPieces = array();
                foreach ($keywords as $word) {
                    $word = trim($word);
                    if (!empty($word)) {
                        $keywordSearchPieces[] = "policy_name LIKE '%$word%'";
                    }
                }

                //Cut categories up into individual search phrases, place in array for query.
                $categorySearchPieces = array();

                if ($_POST['cats']) {
                    foreach ($_POST['cats'] as $word) {
                        $word = trim($word);
                        if (!empty($word)) {
                            $categorySearchPieces[] = "category = '$word'";
                        }
                    }
                }

               $sql = "SELECT DISTINCT * FROM policies WHERE " . implode(' OR ', $keywordSearchPieces) . " AND (" . implode(' OR ', $categorySearchPieces) . ") ORDER BY category ASC;";

               $result = mysqli_query($conn, $sql);
                                                
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $numOfResults = mysqli_num_rows($result);
                    echo "<br />";
                    echo '<a class="btn btn-primary" style="color:#fff;" onclick="goBack()">New Search</a>';
                    echo "<br /><br />";
                    echo "<h3>" . $numOfResults . " Search Results</h3>";

                    while($row = mysqli_fetch_assoc($result)) {

                        echo '
                            <br />
                            <div class="card">
                                <div class="card-header">
                                    ' . $row['category'] . '
                                </div>
                                <div class="card-body">
                                    <a style="position:relative; float:right;" class="btn btn-success" href="./res/policies/' . $row['file_name'] . '.pdf">Download Policy</a>
                                    <h5 class="card-title">' . $row['file_name'] . ': ' . $row['policy_name'] . '</h5>
                                    <p class="card-text">Policy Number: ' . $row['policy_num'] . '</p>
                                </div>
                            </div>
                        ';   
                         
                    }
                } else {
                    echo "<br />";
                    echo '<a class="btn btn-primary" style="color:#fff;" onclick="goBack()">New Search</a>';
                    echo "<br /><br />";
                    echo "<h3>No Search Results Found in Database</h3>";
                }
                //End of keyword search
            } else {
                //Start of category search

                //Cut categories up into individual search phrases, place in array for query.
                $categorySearchPieces = array();

                if ($_POST['cats']) {
                    foreach ($_POST['cats'] as $word) {
                        $word = trim($word);
                        if (!empty($word)) {
                            $categorySearchPieces[] = "category = '$word'";
                        }
                    }
                }

               $sql = "SELECT DISTINCT * FROM policies WHERE " . implode(' OR ', $categorySearchPieces) . ") ORDER BY category ASC;";

               $result = mysqli_query($conn, $sql);
                                                
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $numOfResults = mysqli_num_rows($result);
                    echo "<br />";
                    echo '<a class="btn btn-primary" style="color:#fff;" onclick="goBack()">New Search</a>';
                    echo "<br /><br />";
                    echo "<h3>" . $numOfResults . " Search Results</h3>";

                    while($row = mysqli_fetch_assoc($result)) {

                        echo '
                            <br />
                            <div class="card">
                                <div class="card-header">
                                    ' . $row['category'] . '
                                </div>
                                <div class="card-body">
                                    <a style="position:relative; float:right;" class="btn btn-success" href="./res/policies/' . $row['file_name'] . '.pdf">Download Policy</a>
                                    <h5 class="card-title">' . $row['file_name'] . ': ' . $row['policy_name'] . '</h5>
                                    <p class="card-text">Policy Number: ' . $row['policy_num'] . '</p>
                                </div>
                            </div>
                        ';   
                          
                    }
                } else {
                    echo "<br />";
                    echo '<a class="btn btn-primary" style="color:#fff;" onclick="goBack()">New Search</a>';
                    echo "<br /><br />";
                    echo "<h3>No Search Results Found in Database</h3>";
                }
            }

                ?>
	
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
<script src="NJPage.js"></script>
<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>