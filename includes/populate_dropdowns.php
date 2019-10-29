<?php
	$basedir = "../policies";

	function parse_timestamp($d) {
		return intval(split($d, "-")[2] + join("", array_slice(split($d, "-"), 0, 2)) + join("", split(split($d1, "T")[1], ":")));
	}

	function make_timestamp($d) {
		if (strlen(strval($d)) !== strlen("201910291340")) {
			return "00-00-0000T00:00:00";
		}
		$s = strval($d);
		$date = substr($s, 4, 2) . "-" . substr($s, 6, 2) . "-" . substr($s, 0, 4);
		$time = substr($s, 8, 2) . ":" . substr($s, 10, 2) . ":" . substr($s, 12, 2);
		return $date . "T" . $time;
	}

	function most_recent($a) {
		return make_timestamp(max(array_map("parse_timestamp", $a)));
	}

	function remove_date($v) {
		return split($v, "|")[0];
	}

	function tree($path) {
		$out = {};
		$dir = new DirectoryIterator(dirname($path));
		foreach ($dir as $fileinfo) {
			if (!$fileinfo->isDot()) {
				if ($fileinfo->isDir()) {
					$out[$fileinfo->getFilename()] = get_folder($path . "/" . $fileinfo->getFilename());
				} else {
					$out[$fileinfo->getFilename()] = $fileinfo->getFilename();
					if (in_array(remove_date($fileinfo->getFilename()), array_map("remove_date" array_keys($out)))) {
						
					}
				}
			}
		}
	}

	$policies = tree($basedir);
?>