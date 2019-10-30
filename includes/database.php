<?php
	$servername = "localhost";
	$username = "njsite";
	$password = "nj1234";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	$sql = "SELECT * FROM `Policies`";
	$result = mysqli_query($conn, $sql);

	$rows = array();
	while ($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	
	print json_encode(array("policydb"=>$rows));
?>