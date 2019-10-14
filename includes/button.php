<!---
	in php.ini file_uploads needs to be set to "On" (file_uploads = On)

	it would be 100% ok to change the button style, but that is too much work for me considering you'd have to do some sneaky things like `position: absolute` and `opacity: 0` to the button that comes from the input tag under the form, followed by a div styled however you want to take the button's place, and i don't particularly want to put that much effort into something that isn't too important
-->

<div class="upload">
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="to_upload" id="to_upload">
		<input type="submit" value="upload file" name="submit">
	</form>
</div>
<?php
function ne($v) {
	return $v != "";
}

$upload_ok = "none";
$ok = count(array_filter($_GET, "ne")) > 0;
if ($ok) {
	$upload_ok = parse_str($_GET["upload_ok"]);
}

// content signifying upload status below. i'm using a span element but it can be changed to whatever so long as status is respected i guess

if ($upload_ok == 0) { ?>
	<!-- unknown error, probably server-related -->
	<span class="upload_fail">Sorry, the upload failed! Please try again.</span>
<?php } elseif ($upload_ok == 1) { ?>
	<!-- success -->
	<span class="upload_success">File successfully uploaded!</span>
<?php } elseif ($upload_ok == 2) { ?>
	<!-- file exists. ignore this if you allow for replacement in upload.php -->
	<span class="upload_fail">Sorry! The upload failed because the file already exists on the server.</span>
<?php } elseif ($upload_ok == 3) { ?>
	<!-- invalid file format -->
	<!-- i could not figure out a way to make this dynamic but if someone happens to know something go for it -->
	<span class="upload_fail">Sorry! The upload failed because the file specified is not a pdf, docx, or doc file.</span>
<?php } ?>
