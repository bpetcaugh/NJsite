<?php

    require("functions.php");

    $myusername=strip($_POST['username']);
    $mypassword=strip($_POST['password']);

    if(!$conn) {
        die();
        setAlert("danger", "Cannot connect to the database. Please try again soon.");
        header("location: index.php");
    }

    if(checkToken($_POST['token'])){
        
        $sql = "SELECT * FROM users WHERE username= '$myusername'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (isPasswordCorrect($row['username'], $mypassword)) {
            $_SESSION["id"] = $row["id"];
            if ($row['accessLevel'] == 'root') {
                $_SESSION["setAccessLevel"] = true;
                //header("location: admindash.php");
            } else {
                $_SESSION["setAccessLevel"] = false;
                //header("location: standarddash.php");
            }
            header("location: admindash.php");
        }else{
            setAlert("danger", "Login failed. Please try again."); 
            //header('Location: '.$_SERVER['REQUEST_URI']);
            header("location: index.php");
        }
    }else{
        setAlert("danger", "Error. Please try logging in again.");
        //header('Location: '.$_SERVER['REQUEST_URI']);
        header("location: index.php");
    }
    
    mysqli_close($conn);

 ?>
