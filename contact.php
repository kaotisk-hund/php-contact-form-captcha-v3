<?php
/*
 * Title: PHP Contact form with Captcha v3
 * Tags: PHP, HTML5 and CSS.
 *
 * Author: Kaotisk Hund <kaotiskhund@gmail.com>
 *
 * Description: The following code results to a sent email with the
 * form contents ($user, $email and $message), to the $sent_to add-
 * ress, checked with hidden captcha provided by google. Make sure
 * you update the $recaptcha_secret variable.
 *
 * License: GNU GPL v3
 */

include 'config.php';

// Check if form was submitted:
if($_POST != NULL && $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['email']!= NULL){
	// Assign
	$user = $_POST['user'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	if (recaptcha_enabled){
		// Build POST request:
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		$recaptcha_response = $_POST['recaptcha_response'];
	}

	// Format subject
	$subject = '['.$sitename.'] '.$user . ' sent you an email using your web form at your site.';
	// Format email
	$full_message = 'Name : '. $user. "\r\n" . 'Email : ' .$email. "\r\n".'Message : ' .$message;
	if (recaptcha_enabled){
		// Make and decode POST request:
		$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
		$recaptcha = json_decode($recaptcha);

		// Take action based on the score returned:
		if ($recaptcha->score >= 0.5) {
			// Verified - send email
			$status = '<div class="small-12 column label success">Mail sent</div>';
			mail($sent_to, $subject, $full_message);
		} else {
			//  Not verified - show form error
		   echo '<div class="small-12 column label alert">Mail failed, please try again or use another form of contact.</div>';
		}
	} else {
		$status = '<div class="small-12 column label success">Mail sent</div>';
		mail($sent_to, $subject, $full_message);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $sitename; ?> | Contact form</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div id="contact">
		<div class="status"><?php if ($status != NULL){ echo $status; } ?>
		<!-- Form -->
		<h1>Contact form</h1>
		<p><?php echo $description; ?></p>
		<form method="post" action="">
			<label>Your name
				<input name="user" type="text" placeholder="e.g. John Smith"/>
			</label>
			<br>
			<label>Email address
					<input name="email" type="text" placeholder="e.g. mail@example.com"/>
			</label>
			<br>
			<label>Message<br>
				<textarea name="message" placeholder="Type your message/questions here"></textarea>
			</label>
			<br>
			<input type="submit" class="button success" value="Send"/>
			<input type="reset" class="button alert" value="Clear form"/>
			<?php
				if (recaptcha_enabled) {
					echo '<input type="hidden" name="recaptcha_response" id="recaptchaResponse">';
				}
			?>
		</form>
		<!-- End of Form -->
		</div>
	</div>
	<footer>
		<p>
			Source code: <a href="https://github.com/kaotisk-hund/php-contact-form-captcha-v3">@github</a>
		</p>
	</footer>
	</body>
</html>
