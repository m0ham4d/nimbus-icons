<?php

$directory = __DIR__; // Change this to your main directory if needed.

function removeSpecificFiles($dir) {
	$files = scandir($dir);

	foreach ($files as $file) {
		if ($file === '.' || $file === '..') {
			continue;
		}

		$fullPath = $dir . DIRECTORY_SEPARATOR . $file;

		if (is_dir($fullPath)) {
			// Recursively process subdirectories
			removeSpecificFiles($fullPath);
		} else {
			// Check if the file matches the patterns
			if (
				strpos($file, 'baseline.blade.php') !== false
				|| strpos($file, 'sharp.blade.php') !== false
				|| strpos($file, 'twotone.blade.php') !== false
			) {
				unlink($fullPath);
				echo "Deleted: $fullPath\n";
			}
		}
	}
}

removeSpecificFiles($directory);