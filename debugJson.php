<?php
if ($argc < 2) {
	echo "Usage: php " . basename(__FILE__) . " filename\n";
	exit;
}
$file = $argv[1];
$json = file_get_contents($file);
$debugArray = json_decode($json, true);
print_r($debugArray);
echo "\n";
?>
