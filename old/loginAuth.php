<?php

    require("functions.php");

    $myusername=strip($_POST['username']);
    $mypassword=strip($_POST['password']);

    

    $mypassword = md5($mypassword);
    

    if(!$conn) {
        die();
        setAlert("danger", "Cannot connect to the database. Please try again soon.");
        header("location: index.php");
    }


    if(checkToken($_POST['token'])){
        
        $sql = "SELECT * FROM users WHERE username= '$myusername'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $mypassword) {
            $_SESSION["id"] = $row["id"];
            if ($row['accessLevel'] == 'root') {
                header("location: rootdashboard.php");
            } else {
                header("location: dashboard.php");
            }
        }else{
            setAlert("danger", "Login failed. Please try again.");
            header("location: index.php");
        }
    }else{
        setAlert("danger", "Error. Please try logging in again.");
        header("location: index.php");
    }
    
    mysqli_close($conn);

 ?>
