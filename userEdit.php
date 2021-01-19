<?php include("connect.php"); ?>
<?php
    require("functions.php");
    checkSession();
    
    //Determine where to go BACK after they are finished with page.
    $temp_back = end(explode("/", $_SERVER['HTTP_REFERER']));
    if (strpos($temp_back, 'userEdit.php') !== false) {
        //Do Nothing
    } else{
        $_SESSION['back'] = end(explode("/", $_SERVER['HTTP_REFERER']));     
    }

    if(isset($_POST['accessLevel']))
	{
        if ($_SESSION['back'] == 'userList.php') {
            $un = $_POST['userName'];
            $fn = $_POST['firstName'];
            $ln = $_POST['lastName'];
            $e = $_POST['email'];
            $o = $_POST['office'];
            $cc = $_POST['costCode'];
            $al = $_POST['accessLevel'];
            $id = $_POST['id'];

            $sql = "UPDATE users 
            SET username='{$un}', firstname='{$fn}', lastname='{$ln}', email='{$e}', office='{$o}', costcode='{$cc}', accessLevel='{$al}'
            WHERE id='{$id}'";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: {$_SESSION['back']}");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            $un = $_POST['userName'];
            $fn = $_POST['firstName'];
            $ln = $_POST['lastName'];
            $e = $_POST['email'];
            $o = $_POST['office'];
            $cc = $_POST['costCode'];
            $id = $_POST['id'];

            $sql = "UPDATE users 
            SET username='{$un}', firstname='{$fn}', lastname='{$ln}', email='{$e}', office='{$o}', costcode='{$cc}'
            WHERE id='{$id}'";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: {$_SESSION['back']}");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);            
        }
        
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
					<img src="./res/images/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>Edit User</h1>

                <?php

                    $sql = "SELECT * FROM users WHERE id={$_GET['id']}";
                    $result = mysqli_query($conn, $sql);

                    $un = '';
                    $fn = '';
                    $ln = '';
                    $email = '';
                    $off = '';
                    $cc = '';
                    $al = '';

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {

                            $un = $row["username"];
                            $fn = $row["firstname"];
                            $ln = $row["lastname"];
                            $email = $row["email"];
                            $off = $row["office"];
                            $cc = $row["costCode"];
                            $al = $row["accessLevel"];

                        }
                    }

                ?>


                <form class="needs-validation" action="userEdit.php" method="post" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="firstName" value="<?php echo $fn;?>"
                            required>
                            <div class="invalid-feedback">
                            Please provide a first name.
                        </div>

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" name="lastName" value="<?php echo $ln;?>"
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
                            <input type="text" class="form-control" id="validationCustomUsername" name="userName" value="<?php echo $un;?>"
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
                        <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $email;?>" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Office</label>
                        <input type="text" class="form-control" id="validationCustom04" name="office" value="<?php echo $off;?>" required>
                        <div class="invalid-feedback">
                            Please provide a valid office.
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Cost Code</label>
                        <input type="text" class="form-control" id="validationCustom05" name="costCode" value="<?php echo $cc;?>" required>
                        <div class="invalid-feedback">
                            Please provide a valid cost code.
                        </div>
                        </div>
                    </div>

                    <div class="form-group" <?php if ($_SESSION['back'] == 'userProfile.php' || $_SESSION['id'] == $_GET['id']) {echo 'style="position:absolute; visibility:hidden;"';} ?>>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="standard" name="accessLevel" value="standard" <?php if ($al == 'standard') {echo "checked";}?>>
                        <label class="form-check-label" for="accessLevel">Standard</label>
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="admin" name="accessLevel" value="root" <?php if ($al == 'root') {echo "checked";}?>>
                        <label class="form-check-label" for="accessLevel">Admin</label>
                        </div>

                        <input style="position:absolute;" type="hidden" name="id" value="<?php echo $_GET['id'];?>"> 

                    </div>
                        <button class="btn btn-success" type="submit">Save</button>
                        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                    </form>

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

function goBack() {
  window.history.back();
}
</script>

</body>
</html>