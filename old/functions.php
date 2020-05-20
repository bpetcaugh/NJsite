<?php

//Main file to website functions

    session_start();
    require("connect.php");

//Strip slashes and escape strings for post variables
function strip($string){
    global $conn;
    $final = stripslashes($string);
    $final = mysqli_real_escape_string($conn, $final);
    return $final;
}

//Create token for secure form submission
function createToken(){
    $_SESSION['token'] = md5(uniqid(rand(), TRUE));
}

//Check token value
function checkToken($token){
    if($token == $_SESSION['token']){
        return true;
    }else{
        return false;
    }
}

//Check if user is already logged in and redirect to appropriate page
function checkSession(){
    $page = basename($_SERVER['PHP_SELF']);
    if($page != 'index.php' && !isset($_SESSION['id'])){
        header("location: index.php");
    }
}

//Set alerts 
function setAlert($type, $message){
    $_SESSION['alert'] = "<div class='alert alert-$type' alert-dismissible' role='alert' id='alerts'>
    $message
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
}

//Show alerts
function showAlert(){
    if($_SESSION['alert'] != "none"){
        echo $_SESSION['alert'];
        $_SESSION['alert'] = "none";
    }
}

//Get info of user by id
function getUserInfo($id, $type){
    global $conn;
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    return $row[$type];
}

//Create and show all changes
function showChanges($file){
    if($file != null){
        global $conn;
        $sql = "SELECT * FROM updates WHERE filename='$file' ORDER BY id DESC";
        $result = $conn->query($sql);
        
        if(mysqli_num_rows($result) > 0){
            
            while($row = $result->fetch_assoc()){

            echo'<div class="card">
                    <h5 class="card-header">' . $row['date'] . '</h5>
                        <div class="card-body">
                            <h5>' . $row['filename'] . '</h5>
                            <footer class="blockquote-footer">' . getUserInfo($row['author'], 'username') . '</footer>
                            <p class="card-text">' . $row['body'] . '</p>
                        </div>
                </div><br>';
            }
            
        }else{
            echo '<p class="text-center">No changes yet.</p>';
        }
    }
}

//Show options for change dropdown
function showChangeOptions(){
    global $conn;
    $sql = "SELECT DISTINCT filename FROM updates";
    $result = $conn->query($sql);

    echo "<option>Select File</option>";
    while($row = $result->fetch_assoc()){
        echo "<option>" . $row['filename'] . "</option>";
    }

}

?>