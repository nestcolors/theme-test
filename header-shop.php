<?php
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600));
header('Content-Type: text/html; charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header('X-UA-Compatible: IE=Edge,chrome=1');
/*
// HTML Compress
function ob_html_compress($buf){
return preg_replace(array('/<!--(?>(?!\[).)(.*)(?>(?!\]).)-->/Uis','/[[:blank:]]+/'),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
ob_start('ob_html_compress');
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wpa_title(); ?></title>
	<meta name="HandheldFriendly" content="True"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<!--    <meta name="theme-color" content="#6aa35b">--><!--add color-->
	<meta name="format-detection" content="telephone=no">
	<!--    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16 32x32 48x48">-->
	<!--    <link rel="shortcut icon" type="image/x-icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16">-->
	<!--    <link rel="icon" type="image/x-icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16">-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>">