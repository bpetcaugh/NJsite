<?php include("connect.php"); ?>
<?php
    require("./functions.php");
	checkSession();
	$fileset = false;
	
	if(isset($_POST['myFile']) )
	{
		$fileset = true;
    }

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
        echo "AL: " . $_POST['accessLevel'];


        $sql = "INSERT INTO users (username, password, firstname, lastname, email, office, costcode, accessLevel)
        VALUES ('{$un}', '{$p}','{$fn}', '{$ln}', '{$e}', '{$o}', '{$cc}', '{$al}')";

        echo $sql;

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
                <h1>Change Password</h1>
                <p>This page is currently being worked on.</p>
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
<!--
                <form class="needs-validation" action="userAdd.php" method="post" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="firstName" placeholder="First name"
                            required>
                            <div class="invalid-feedback">
                            Please provide a first name.
                        </div>

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" name="lastName" placeholder="Last name"
                            required>
                            <div class="invalid-feedback">
                            Please provide a last name.
                        </div>

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="validationCustomUsername" name="userName" placeholder="Username"
                            aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                            Please choose a username.
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input type="text" class="form-control" id="validationCustom03" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Office</label>
                        <input type="text" class="form-control" id="validationCustom04" name="office" placeholder="Office" required>
                        <div class="invalid-feedback">
                            Please provide a valid office.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Cost Code</label>
                        <input type="text" class="form-control" id="validationCustom05" name="costCode" placeholder="Cost Code" required>
                        <div class="invalid-feedback">
                            Please provide a valid cost code.
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Temporary Password</label>
                        <input type="password" class="form-control" id="validationCustom04" name="password" required>
                        <div class="invalid-feedback">
                            Please provide a temporary password to the user.
                        </div>
                        </div>        

                    </div>

                    <div class="form-group">

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="standard" name="accessLevel" value="standard" checked>
                        <label class="form-check-label" for="accessLevel">Standard</label>
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="admin" name="accessLevel" value="root">
                        <label class="form-check-label" for="accessLevel">Admin</label>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                    <a class="btn btn-primary" href="userList.php">Cancel</a>
                    </form>
-->
            </div>
        </div>
    </div>

			<!-- javascript libraries -->
<?php //include("./includes/jslibraries.php"); ?>
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

function goBack() {
  window.history.back();
}
</script>

</body>
</html>