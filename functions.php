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

/*
Add an item for admin to approve
*/
function add_policy_approval_item($id_user, $policy_filename, $category, $comments) {
    //categories: DELETE, MODIFY, ADD
    global $conn;
    //Delete file
    $sql = "INSERT INTO policyupdates (userid, policyid, typeofupdate, changestatus, comments)
    VALUES ({$id_user},'{$policy_filename}','{$category}', 'PENDING','{$comments}')";
    mysqli_query($conn, $sql);

}

function update_checklist_approval($id,$decision,$adminuser) {
    global $conn;
    $current_time = time();
    $sql = "UPDATE policyupdates SET approvedby='{$adminuser}',changestatus='{$decision}',updatedate=CURRENT_TIMESTAMP WHERE id={$id};";
    mysqli_query($conn, $sql);
}

/*
File Updates
*/
function deleteFile() {

}

function modifyFile() {
    let x = 1;
}

function addNewCategory() {
    let y = 1;
}

/*
Usernames and Passwords
*/

function setPassword($user, $pw) {
    $hash = password_hash($pw, PASSWORD_DEFAULT);

    global $conn;
    $sql = "UPDATE users SET password='" . $hash . "' WHERE username='" . $user . "';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($user == $row['username'] && $hash == $row['password']) {
        return True;
    }
    return False;
}

function isPasswordCorrect($user, $pw) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='" . $user . "';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    //Check that the users typed password (pw) is the same as the hashed password in the DB
    if (is_array($row)) {
        if (password_verify($pw, $row['password'])) {
            return True;
        }
    }
    return False;
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
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    return $row[$type];
}


//Create and show all changes
function showChanges($file){
    if($file != null){
        global $conn;
        $sql = "SELECT * FROM Policies WHERE policy_name='$file' ORDER BY version_num DESC";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result)){

            echo'<div class="card">
                    <h5 class="card-header">' . $row['date'] . '</h5>
                        <div class="card-body">
                            <h5>' . $row['policy_name'] . '</h5>
                            <footer class="blockquote-footer">' . getUserInfo($row['author'], 'username') . '</footer>
                            <p class="card-text">' . $row['reasoning'] . '</p>
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
    $sql = "SELECT DISTINCT policy_name FROM Policies";
    $result = mysqli_query($conn, $sql);

    echo "<option>Select File</option>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<option>" . $row['policy_name'] . "</option>";
    }

}

?>