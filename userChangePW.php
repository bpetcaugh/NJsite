<?php include("connect.php"); ?>
<?php
    require("functions.php");
    checkSession();
    
    if(isset($_POST['newPW'])) {
        setPassword(getUserInfo($_SESSION['id'], "username"),$_POST['newPW']);
        header('Location: userProfile.php');
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

<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

    <style>
        label
        {
            width: 100px;
        }

        .alert
        {
            display: none;
        }

        .requirements
        {
            list-style-type: none;
        }

        .wrong .fa-check
        {
            display: none;
        }

        .good .fa-times
        {
            display: none;
        }
    </style>

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
                <h1>Change Your User Password</h1>

                <form class="needs-validation" action="userChangePW.php" method="post">
                <div class="row my-5">
                    <div class="col-md-4">
                        <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="inputValidationEx2" class="form-control validate" name="newPW">
                        <label for="inputValidationEx2" data-error="wrong" data-success="right" style="width:200px;">Type your password</label>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="alert alert-warning password-alert" role="alert">
                        <ul>
                            <li class="requirements leng"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 8 chars.</li>
                            <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
                            <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
                            <li class="requirements special-char"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 special char.</li>
                            <!--<li class="requirements matching"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your passwords must match.</li>-->
                        </ul>
                        </div>

                    </div>
                    </div>

                </div>
                <!--
                <div class="row my-5">
                    <div class="col-md-4">
                            <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" id="inputValidationEx3" class="form-control validate">
                            <label for="inputValidationEx2" data-error="wrong" data-success="right" style="width:200px;">Re-Type your password</label>
                            </div>
                    </div>
                </div>-->
                <button class="btn btn-success" type="submit">Save</button>

                </form>

            
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
            </div>
        </div>
    </div>

			<!-- javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="NJPage.js"></script>
<script>
//Function code taken (and modified) from: https://mdbootstrap.com/snippets/jquery/tomekmakowski/631899#js-tab-view
$(function () {
    var $password = $(".form-control[type='password']");
    var $passwordAlert = $(".password-alert");
    var $requirements = $(".requirements");
    var leng, bigLetter, num, specialChar;
    var $leng = $(".leng");
    var $bigLetter = $(".big-letter");
    var $num = $(".num");
    var $specialChar = $(".special-char");
    var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
    var numbers = "0123456789";

    $requirements.addClass("wrong");
    $password.on("focus", function(){$passwordAlert.show();});

    $password.on("input blur", function (e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 8) {
            leng = false;
        }
        else if (val.length > 7) {
            leng=true;
        }
        

        if(val.toLowerCase()==val){
            bigLetter = false;
        }
        else{bigLetter=true;}
        
        num = false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<numbers.length; j++){
                if(val[i]==numbers[j]){
                    num = true;
                }
            }
        }
        
        specialChar=false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<specialChars.length; j++){
                if(val[i]==specialChars[j]){
                    specialChar = true;
                }
            }
        }

        console.log(leng, bigLetter, num, specialChar);
        
        if(leng==true&&bigLetter==true&&num==true&&specialChar==true){
            $(this).addClass("valid").removeClass("invalid");
            $requirements.removeClass("wrong").addClass("good");
            $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        }
        else
        {
            $(this).addClass("invalid").removeClass("valid");
            $passwordAlert.removeClass("alert-success").addClass("alert-warning");

            if(leng==false){$leng.addClass("wrong").removeClass("good");}
            else{$leng.addClass("good").removeClass("wrong");}

            if(bigLetter==false){$bigLetter.addClass("wrong").removeClass("good");}
            else{$bigLetter.addClass("good").removeClass("wrong");}

            if(num==false){$num.addClass("wrong").removeClass("good");}
            else{$num.addClass("good").removeClass("wrong");}

            if(specialChar==false){$specialChar.addClass("wrong").removeClass("good");}
            else{$specialChar.addClass("good").removeClass("wrong");}
        }
        
        
        if(e.type == "blur"){
                $passwordAlert.hide();
            }
    });
});

function goBack() {
  window.history.back();
}
</script>

</body>
</html>