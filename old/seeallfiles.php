<?php 
print "<h1>Click any file below to download to your computer.</h1>";

$base_URL = "http://cs.holyghostprep.org/njdcf/";
$rerun_base_URL = "http://cs.holyghostprep.org/testsite/dd_test.php";
$URLs_to_Use = array("testsite");
//GLOB_ONLYDIR
$dirs = glob('allfiles/*.pdf');
foreach ($dirs as &$value) {
    $newURL = $base_URL . $value;
    print "<a href='" . $newURL . "'>".$value."</a><br>";
}
print "++++++++++++++++++++++++++++++++++++++++++++++++++";
print $dirs;


?>