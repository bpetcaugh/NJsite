<?php
	$servername = "localhost";
	$username = "njsite";
	$password = "nj1234";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	$sql = "SELECT * FROM `Policies`";
	$result = mysqli_query($conn, $sql);

	// get all the rows into an array
	$rows = array();
	while ($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}

	// display it as json
	echo json_encode(array("policydb"=>$rows));
?>