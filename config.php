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

/*
 * The following will appear in contact form and the subscribe landpage.
 */
$sitename = 'YOUR SITE NAME HERE';

/*
 * If you would like to add a description in the contact form, you can
 * do it here.
 */
$description = '';

/*
 * The email address you wish the mails both form contact form and
 * subscribe landpage to be sent.
 */
$sent_to = 'YOUR EMAIL HERE';

/*
 * If you would like to enable and use ReCaptcha v3 you have to set the
 * following to true.
 */
$recaptcha_enabled = false;

/*
 * And if you enabled recaptcha, then you have to write your secret
 * recaptcha key here.
 */
$recaptcha_secret = 'YOUR SECRET KEY HERE';

