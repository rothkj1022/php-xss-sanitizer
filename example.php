<?php
require('vendor/autoload.php');
require('src/Sanitizer.php');

$cacheFolder = dirname(__FILE__).'/tmp/';

// contants for testing
define('FS_CACHE', $cacheFolder);

// set timezone
date_default_timezone_set("America/Chicago");

$_GET['test_html'] = '<img src="javascript:evil();" onload="evil();" />Test html';

//INSTANTIATE ERROR HANDLER
use rothkj1022\Sanitizer;
$config = (require('example.config.php')); //EDIT THIS FILE
$sanitizer = new Sanitizer\Sanitizer($config);
$_GET = $sanitizer->sanitize($_GET);
$_POST = $sanitizer->sanitize($_POST);
$_FILES = $sanitizer->sanitize($_FILES, true);

echo '<pre>';
print_r($_GET);
echo '</pre>';