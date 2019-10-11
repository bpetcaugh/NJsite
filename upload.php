<?php
$target_dir = "/var/www/html/students/jnijs/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$upload_ok = 1;

// check if the file exists. we can have an option to ignore this on the form
if (file_exists($target_file)) {
    echo "the file already exists on this server";
    $upload_ok = 0;
}

// check file size. again, not necessary but options are good
if ($_FILES["to_upload"]["size"] > 500000) {
    echo "your file is too large";
    $upload_ok = 0;
}

if (! in_array(pathinfo($_FILES["to_upload"]["name"], PATHINFO_EXTENSION), [
	0 => "doc",
	1 => "docx",
	2 => "pdf",
])) {
	echo "invalid file format";
	$upload_ok = 0;
}

// check if $upload_ok is set to 0 by an error
if ($upload_ok == 0) {
    echo "file was not uploaded";
} else {
    if (move_uploaded_file($_FILES["to_upload"]["tmp_name"], $target_file)) {
        echo "file " . basename( $_FILES["to_upload"]["name"]) . " has been uploaded";
    } else {
        echo "sorry, there was an error uploading your file";
    }
}

echo "debug:<pre>";
echo "\nuploaded to: ";
print_r("\n" . $target_file . "\n");
print_r($_FILES);
print "</pre>";

?>