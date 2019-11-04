<?php
$target_dir = "../res/policies";
$target_file = $target_dir . basename($_FILES["to_upload"]["name"]);
$upload_ok = $_POST["upload_ok"];

if (move_uploaded_file($_FILES["to_upload"]["tmp_name"], $target_file)) {
    $upload_ok = 1;
} else {
    $upload_ok = 0; // unknown error
}
?>