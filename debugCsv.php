<?php
if ($argc < 2) {
	echo "Usage: php " . basename( __FILE__) . " filename [filename] [filename]\n";
	exit;
}
for ($j=1; $j<$argc; $j++) {
	$file = $argv[$j];
	$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	switch($ext) {
		case 'csv':
			$delimiter = ',';
			break;
		case 'tsv':
			$delimiter = "\t";
			break;
		default:
			echo "Skipping " . $file . "\n";
			continue;
	}
	echo $file . "\n";
	$csv = file_get_contents($file);
	$lines = preg_split('/[\r\n]+/', $csv, -1, PREG_SPLIT_NO_EMPTY);
	if (!empty($lines)) {
		$headers = str_getcsv($lines[0], $delimiter);
		$headerColumnCount = count($headers);
		for ($i=1, $length=count($lines); $i<$length; $i++) {
			$row = str_getcsv($lines[$i], $delimiter);
			$rowColumnCount = count($row);
			while ($rowColumnCount < $headerColumnCount) {
				$row[] = '';
				$rowColumnCount++;
			}
			if ($headerColumnCount == $rowColumnCount) {
				$row = array_combine($headers, $row);
			}
			print_r($row);
		}
	}
	echo "\n";
}
?>
