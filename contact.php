
<?php
/*
 * Title: Contact form
 * Tags: PHP, JS, HTML5 and CSS.
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


$sitename = 'YOUR SITE NAME HERE';
$sent_to = 'YOUR EMAIL HERE';

// Check if form was submitted:
if($_POST != NULL && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response']) && $_POST['email']!= NULL){
    // Assign
    $user = $_POST['user'];
    $email = $_POST['email'];
    $message = $_POST['message'];
	// Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = 'YOUR SECRET KEY HERE';
    $recaptcha_response = $_POST['recaptcha_response'];
	
    
    // Format subject
    $subject = '['.$sitename.'] '.$fullname . ' sent you an email using your web form at your site.';
    // Format email
    $full_message = 'Name : '. $user. "\r\n" . 'Email : ' .$email. "\r\n".'Message : ' .$message;
	
	// Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
	
	    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        // Verified - send email
		echo '<div class="small-12 column label success">Mail sent</div>';
		mail($sent_to, $subject, $full_message);
    } else {
        // Not verified - show form error
		echo '<div class="small-12 column label alert">Mail failed, please try again or use another form of contact.</div>';
    }    
}


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $sitename; ?> | Contact form</title>
</head>
<style type="text/css">
	.row .large-12 .small-12 {
		max-width: 100%;
		width: 100%;
	}
	.large-6 .small-6 {
		width: 50%;
	}
</style>
<body>
<div id="contact">
    <!-- Form -->
    <div class="row">
        <div class="large-12 small-12 columns">
            <form method="post" action="">
                <div class="row">
                    <div class="large-6 small-6 column">
                        <label>Your name
                            <input name="user" type="text" placeholder="e.g. John Smith"/>
                        </label>
                    </div>
                    <div class="large-6 small-6 columns">
                        <label>Email address
                                <input name="email" type="text" placeholder="e.g. mail@example.com"/>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 small-12 column">
                        <label>Message
                            <textarea name="message" placeholder="Type your message/questions here"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-6 small-6 columns">
                        <input type="submit" class="button success" value="Send"/>
                    </div>
                    <div class="large-6 small-6 columns">
                        <input type="reset" class="button alert" value="Clear form"/>
                    </div>
                </div>
				 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </form>
        </div>
    </div>
</div>

</body>
</html>