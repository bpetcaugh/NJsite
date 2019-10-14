<?php
$target_dir = "/var/www/html/students/jnijs/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$upload_ok = $_POST["upload_ok"];

// uncomment below if you want it/want to ask the admin if they really want to replace the file, but i suspect that we won't need it

// // check if the file exists. we can have an option to ignore this on the form
// if (file_exists($target_file)) {
//     echo "the file already exists on this server\n";
//     $upload_ok = 2;
// }

// we dont need to restrict ourselves to this either!!
if (! in_array(pathinfo($_FILES["to_upload"]["name"], PATHINFO_EXTENSION), [
	0 => "doc",
	1 => "docx",
	2 => "pdf",
])) {
	$upload_ok = 3;
}

// check if $upload_ok is set to 0 by an error
if (move_uploaded_file($_FILES["to_upload"]["tmp_name"], $target_file)) {
        $upload_ok = 1;
} else {
    $upload_ok = 0; // unknown error
}

// redirect to original page
// upload_ok doesnt matter outside the realm of error checking on the page; it's not a security issue
// alternatively we can have the action redirect to the location of the file on-server if that seems to be a better option, but this should be fine for now
header("Location: " . $_SERVER['HTTP_REFERER'] . "?upload_ok=" . $upload_ok);
?>
