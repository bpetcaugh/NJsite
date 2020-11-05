<?php include("connect.php"); ?>
<?php

if(isset($_POST['sports'])) {
    foreach($_POST['cats'] as $value){
        echo "Categories: " .  $value;
    }

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
					<img src="./res/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
				<h1>Department of Children and Families Policy Manual</h1>
                <br>
                <h3>Search policies</h3>

                <!-- Search form -->
                <form  action="searchkeyword.php" method="post">
                    <input class="form-control" type="text" placeholder="Search Keyword(s)" aria-label="Search" style="width:50%;">
                    <fieldset>
                    <br>
                        <p>Check the categories you would like to search through.</p>
                        
                        <p>
                            <?php

                                $sql = "SELECT DISTINCT category FROM policies ORDER BY category ASC;";      
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                            echo '<label><input type="checkbox" name="cats[]" value="' . $row['category'] . '" />' . "  ". $row['category'] . '</label><br>';                                
                                    }
                                }

                            ?>
                        </p>
                        
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" style="color:#fff;" onclick="goBack()">Cancel</a>
                </form>

                <br><br>

                <?php
                $sql = "SELECT * FROM mytable
                WHERE column1 LIKE '%word1%'
                   OR column1 LIKE '%word2%'
                   OR column1 LIKE '%word3%'";

                ?>
<!--
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Download PDF</a>
                    </div>
                </div>-->
				
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
<script src="NJPage.js"></script>
<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>