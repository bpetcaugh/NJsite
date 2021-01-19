<?php include("connect.php"); ?>

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
                <br>
                <h3>Search Policies</h3>

                <!-- Search form -->
                <form  id="searchForm" action="searchkeyresults.php" method="post">
                    <p>Search for keywords in policy names (to search multiple words, separate each word with a space).</p>
                    <input class="form-control" type="text" name="keywordSearched" placeholder="Search Keyword(s)" aria-label="Search" style="width:50%;">
                    <fieldset>
                    <br>
                        <p>Check the categories you would like to search through:</p>
                        
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
                    <a type="button" style="color:#FFF;" class="btn btn-primary" onclick="resetForm();">Reset</a>
                </form>
                

                <br><br>
				
			</div>
		</div>
    </div>
    
    <script>
        //Determine when to reset all values in the form. 
        //This occurs when the user clicks the 'Reset' button. 

        function resetForm() {
            $('input[type=checkbox]').prop('checked',false);
            $('#searchForm')[0].reset();
        }
    </script>


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