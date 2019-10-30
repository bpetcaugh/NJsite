<?php
	// i hope this is a linux server
	$command = escapeshellcmd('python3 ../py/walk_policies.py');
	$output = shell_exec($command);

	// why is json included with php
	$tree = json_decode($ouput);
	print json_encode(array("policies"=>$tree));
?>