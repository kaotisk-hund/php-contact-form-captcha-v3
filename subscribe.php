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
    $email = $_POST['email'];

    // Format subject
    $subject = '['.$sitename.'] ' . ' has a new subscriber!';
    // Format email
    $full_message = 'User with email address : ' .$email. ' wants to subscribe to your list!';

        $status = '<div class="small-12 column label success">You have successfully subscribed!</div>';
	    mail($sent_to, $subject, $full_message);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $sitename; ?> | Subscription page</title>
    <style type="text/css">

    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="contact">
    <div class="status">
	<?php if ($status != NULL){ echo $status; } ?>
    </div>
    <a style="text-decoration: none; background: none; " href="<?php echo $back_link; ?>">Back</a>
</div>
<footer>
	<p>
		Source code: <a href="https://github.com/kaotisk-hund/php-contact-form-captcha-v3">@github</a>
	</p>
</footer>
</body>
</html>
