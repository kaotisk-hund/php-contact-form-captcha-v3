
 # PHP Contact form with Captcha v3
 ## Using PHP, HTML5 and CSS.
 ### Description

 The following code results to a sent email with the form contents ($user, $email and $message), to the $sent_to address, checked with hidden captcha provided by google. 

 [CHANGELOG](./CHANGELOG.md)
 
 ### Usage
 
 Firstly, you need to configure the variables in `config.php` according to your needs. 
 
 You 'll need to set `$recaptcha_enabled = true` in order to enable recaptcha. Make sure you update the `$recaptcha_secret` variable too!

 After that, you can use the contact form with no further settings.

 ### Subscribe

 There is also a file named `subscribe.php`. This can be used in any form that gets email addresses. When a user submits the form, an email comes to your address with the subscriber's email.

 To use it, you can set the `action=""` property of a `form` element to this script and `method=""` should be `POST`, like:

 ```html

<form action="./subscribe.php" method="POST">
	<input type="email" name="email">
	<input type="submit" name="submit" value="Subscribe">
</form>

 ```
 
 ### License
 GNU GPL v3
