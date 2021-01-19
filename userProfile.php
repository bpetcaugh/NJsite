<?php 
    include("connect.php");
    require("functions.php");
	checkSession();

    if(isset($_POST['accessLevel']) )
	{
        $un = $_POST['userName'];
        $fn = $_POST['firstName'];
        $ln = $_POST['lastName'];
        $e = $_POST['email'];
        $o = $_POST['office'];
        $cc = $_POST['costCode'];
        $al = $_POST['accessLevel'];
        $p = $_POST['password'];

        $sql = "INSERT INTO users (username, password, firstname, lastname, email, office, costcode, accessLevel)
        VALUES ('{$un}', '{$p}','{$fn}', '{$ln}', '{$e}', '{$o}', '{$cc}', '{$al}')";

        //DEBUGGING
        //echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: userList.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        
    }
    
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
                <h1>My Profile</h1>

                <?php

                    $sql = "SELECT * FROM users where id={$_SESSION['id']}";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $timeStamp = $row['dateCreated'];
                        $timeStamp = date( "m/d/Y", strtotime($timeStamp));

                        echo "<p><b>Name:</b> " . $row["firstname"] . " ". $row["lastname"] . "</p>";
                        echo "<p><b>UserName:</b> " . $row["username"]. "</p>";
                        echo "<p><b>Profile Created:</b> " . $timeStamp . "</p>";
                        echo "<p><b>Email:</b> " . $row["email"] . "</p>";
                        echo "<p><b>Office:</b> " . $row["office"] . "</p>";
                        echo "<p><b>Cost Code:</b> " . $row["costCode"] . "</p>";
                        echo "<p><b>Access Level:</b> " . $row["accessLevel"] . "</p>";

                        echo "<div class='btn-group'>
                            <a class='btn btn-primary' href='userEdit.php?id=" . $_SESSION["id"] . "&page=profile'>Edit Information</a>

                            <a class='btn btn-danger' href='userChangePW.php?id=" . $_SESSION["id"] . "'>Change Password</a>
                    </div>";

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="NJPage.js"></script>
<script>
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>

</body>
</html>