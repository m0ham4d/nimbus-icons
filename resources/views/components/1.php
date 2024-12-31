<?php

$directory = __DIR__; // Change this to your main directory if needed.

function addFillToSvg($dir) {
	$files = scandir($dir);

	foreach ($files as $file) {
		if ($file === '.' || $file === '..') {
			continue;
		}

		$fullPath = $dir . DIRECTORY_SEPARATOR . $file;

		if (is_dir($fullPath)) {
			// Recursively process subdirectories
			addFillToSvg($fullPath);
		} elseif (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
			// Read the SVG file
			$content = file_get_contents($fullPath);

			// Add fill="currentColor" to the <svg> tag if not already present
			if (!preg_match('/fill="currentColor"/', $content)) {
				$updatedContent = preg_replace(
					'/<svg(.*?)>/',
					'<svg fill="currentColor"$1>',
					$content
				);

				// Fallback in case the regex fails (e.g., if <svg> spans multiple lines)
				if ($content === $updatedContent) {
					$updatedContent = str_replace(
						'<svg',
						'<svg fill="currentColor"',
						$content
					);
				}

				// Save the updated content
				file_put_contents($fullPath, $updatedContent);
				echo "Updated SVG: $fullPath\n";
			} else {
				echo "No changes needed for: $fullPath\n";
			}
		}
	}
}

addFillToSvg($directory);