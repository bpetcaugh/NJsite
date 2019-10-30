<?php
	// i hope this is a linux server
	$output = shell_exec('python3 ../res/py/walk_policies.py');

	// why is json included with php
	$tree = json_decode($ouput);

	// error checking!!
	$err = json_last_error();
	print json_encode(array("policies"=>$tree, "error"=>$err));
?>