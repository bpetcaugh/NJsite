<!--
	HEY MATT YOU GOTTA PUT THE FILE NAME AND UPLOAD REASON INTO THE DATABASE IN HERE PLEASE DO THAT I HAVE NO IDEA HOW TO DO SQL THANKS

	UPLOAD REASON IS IN $_POST["reason"]
	NEW FILE NAME IS IN $_POST["newname"]

	OK THANKS COOL DO THE SQL THING NICE YEA
	YOUVE GOTTA FIGURE OUT HOW TO GET THE REASONS TO WORK WITH THE VERSION NUMBER THING YEA NICE AIGHT COOL GOOD LUCK
-->

<?php
	$target_dir = "../res/temp/";
	$target_file = $target_dir . $_POST["newname"];
	if (move_uploaded_file($_POST["to_upload"]["tmp_name"], $target_file)) {
	    // things are good
	} else {
	    // unknown error
	}
	$output = shell_exec('python3 ../res/py/upload.py ' . escapeshellarg($_POST["reason"]));
?>
