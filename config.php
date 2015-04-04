<?php

	define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']), true);

	define('WEBROOT', dirname($_SERVER['PHP_SELF'])."/");

	define('SYSTEM', ROOT.'system/');
	define('UTILS', ROOT.'utils/');

	define('UPLOAD', ROOT.'uploads/');
?>