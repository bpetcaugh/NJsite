<?php
	// i hope this is a linux server
	$command = escapeshellcmd('python3 ../res/py/walk_policies.py');
	$output = shell_exec($command);

	// why is json included with php
	$tree = json_decode($ouput);

	// error checking!!
	$err = json_last_error();
	print json_encode(array("policies"=>{}, "error"=>$err));
?>