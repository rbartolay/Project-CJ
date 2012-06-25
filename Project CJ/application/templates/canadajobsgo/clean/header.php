<?php
global $loading_time;
$loading_time = Core_Utilities::startTimer();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>Hammer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="image_src"
			href="<?php echo Configuration::getImagePath() . "logo.jpg"; ?>" />
		<meta property="og:image"
			content="<?php echo Configuration::getImagePath() . "logo.jpg"; ?>" />
		<link href="/cm_files/30251_2670.ico" rel="shortcut icon"
			type="image/x-icon" />
		<link rel="stylesheet"
			href="<?php echo Configuration::getCSSPath() . "default.css"; ?>" />
	</head>
<body class="bodyCandidate">
	<a style="display: none;" class="registration-act"
		href="javascript: void(0)"></a>


	<div id="signInPopup" class="popupForm">

		<div class="closeLink"></div>

		<div class="comtab">

			<div id="lt1" class="tabPopup"
				style="padding-top: 14px; height: 22px;">Login</div>

			<div id="lt2" class="tabPopup"
				style="padding-top: 14px; height: 22px;">Forgot password</div>

		</div>

		<div id="mr1" class="registrationPopup"
			content-url="/main/common_login?formId=15"></div>

		<div id="mr2" class="registrationPopup"
			content-url="/main/recover_password?formId=16"></div>

	</div>

	<div id="forgot-password" class="popupForm">

		<div class="closeLink"></div>

		<div class="comtab_sm">
			<div class="tabPopup" id="t3">Forgot password</div>
		</div>

		<div class="registrationPopup" id="r3" style="display: none"
			content-url="/main/recover_password"></div>

	</div>

	<div id="apply" class="popupForm">

		<div class="closeLink"></div>

		<div class="comtab">

			<div id="at1" class="tabPopup"
				style="padding-top: 14px; height: 22px;">Sign in</div>

			<div id="at2" class="tabPopup">Candidate registration</div>

		</div>

		<div id="ar1" class="registrationPopup"
			content-url="/main/apply_login?formId=2"></div>

		<div id="ar2" class="registrationPopup"
			content-url="/candidate/apply_registration?formId=2&source=%2F"></div>

	</div>

	<div id="loginCandidate" class="popupForm">

		<div class="closeLink"></div>

		<div class="comtab">

			<div id="ct1" class="tabPopup"
				style="padding-top: 14px; height: 22px;">Sign in</div>

			<div id="ct2" class="tabPopup">Candidate registration</div>

		</div>

		<div id="cr1" class="registrationPopup"
			content-url="/main/candidate/login?formId=3"></div>
		<div id="cr2" class="registrationPopup"
			content-url="/candidate/registration?formId=3&source=/"></div>
	</div>

	<div id="loginEmployer" class="popupForm">
		<div class="closeLink"></div>
		<div class="comtab">
			<div id="et1" class="tabPopup">
				<div class="lg">Sign in</div>
			</div>
			<div id="et2" class="tabPopup">Employer registration</div>
		</div>
		<div id="er1" class="registrationPopup"
			content-url="/main/employer/login?formId=4"></div>
		<div id="er2" class="registrationPopup"
			content-url="/employer/registration?formId=4"></div>
	</div>
	<div id="holder" class="indexTpl holder_main">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<div class="logo">
						<a href="/" title="Logo"><img
							src="<?php echo Configuration::getImagePath() . "logo.jpg"; ?>"
							alt="Logo" title="Logo" width="159" />
						</a>
					</div></td>
				<td align="center"></td>
			</tr>

		</table>
