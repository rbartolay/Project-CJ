<?php
global $loading_time;
$loading_time = Core_Utilities::startTimer();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>Canada Jobs Go</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="image_src"
			href="<?php echo Configuration::getImagePath() . "logo.jpg"; ?>" />
		<meta property="og:image"
			content="<?php echo Configuration::getImagePath() . "logo.jpg"; ?>" />
		<link href="/cm_files/30251_2670.ico" rel="shortcut icon"
			type="image/x-icon" />
		<link rel="stylesheet"
			href="<?php echo Configuration::getCSSPath() . "canadajobsgo.css"; ?>" />
		<link rel="stylesheet"
			href="<?php echo Configuration::getCSSPath() . "global.css"; ?>" />
		<script src="<?php echo Configuration::getJSPath() . "jquery-1.7.2.js";?>"></script>
	</head>
<body>

	<div id="holder">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<img src="<?php echo Configuration::getImagePath() . "logo.png";?>"></td>
				<td><?php echo HTMLLayout::signIn(); ?></td>

			</tr>
		</table>		
		<table width="100%">
			<tr>
				<td width="500">
					<ul id="mainmenu">
		                <li><a href="<?php echo Configuration::getURLPath(); ?>" title="Home">Home</a></li>
		                <li><a href="<?php echo Configuration::getURLPath() . "/jobs";?>" title="Jobs">Jobs</a></li>
		                <li><a href="<?php echo Configuration::getURLPath() . "/companies";?>" title="Companies">Companies</a></li>
		                <li><a href="<?php echo Configuration::getURLPath() . "/search"; ?>" title="Mac">Search</a></li>
		                <li><a href="<?php echo Configuration::getURLPath(); ?>" title="Support">About Us</a></li>
		            </ul>
				</td>
				<td width="300" align="right">
					<button class="special" onclick="document.location.href='<?php echo Configuration::getURLPath() . "/registration"?>'">Job Seekers</button>
					<button class="special" onclick="document.location.href='<?php echo Configuration::getURLPath() . "/registration/employer"?>'">Employers</button>
				</td>
			</tr>
		</table>	
		<div class="content">

