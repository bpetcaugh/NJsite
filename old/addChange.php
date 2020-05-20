<?php

    require("functions.php");

    $myFile=strip($_POST['file']);
    $myChange=strip($_POST['change']);

    $myDate = date("Y-m-d");
    $user = $_SESSION['id'];

    if($conn->connect_error) {
        die();
        setAlert("danger", "Cannot connect to the database. Please try again soon.");
        header("location: dashboard.php");
    }

    if(checkToken($_POST['token'])){
        
        $sql = "INSERT INTO updates (author, filename, body, date) VALUES ('$user', '$myFile', '$myChange', '$myDate')";

        if ($result = $conn->query($sql)) {
            setAlert("success", "Change added successfully!");
            header("location: dashboard.php");
        }else{
            setAlert("danger", "Error. The Change could not be added. Please try again.");
            header("location: dashboard.php");
        }
    }else{
        setAlert("danger", "Error. Please try logging in again.");
        header("location: index.php");
    }
    
    $conn->close();

 ?>
