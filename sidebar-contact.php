<?php dynamic_sidebar('contact'); ?>

<!-- CONTACT-----------------------------------------
____ ____ _  _ ___ ____ ____ ___ 
|    |  | |\ |  |  |__| |     |  
|___ |__| | \|  |  |  | |___  | 

--------------------------------------------------- -->
<?php

	//response generation function

	$response = "test";

	//function to generate response
	function my_contact_form_generate_response($type, $message){

	global $response;
	
	if($type == "success") $response = "<div class='success'>{$message}</div>";
	else $response = "<div class='error'>{$message}</div>";

	}
	
	//response messages
	$not_human       = "Human verification incorrect.";
	$missing_content = "Please supply all information.";
	$email_invalid   = "Please Enter a Valid Email Address";
	$message_unsent  = "Sorry Your Message was not sent. Please Try Again.";
	$message_sent    = "Thank You! Your message has been sent, I will get back to you within the next two days.";

	//user posted variables
	$name = $_POST['message_name'];
	$email = $_POST['message_email'];
	$message = $_POST['message_text'];
	$subject = $_POST['message_subject'];
	$human = 2;

	//php mailer variables
	$to = "sparkleraptor@gmail.com";
	$subject = "Someone sent a message from ".get_bloginfo('name');
	$headers = 'From: '. $email . "\r\n" .
	'Reply-To: ' . $email . "\r\n";

	if(!$human == 0){
	if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
	else {

		//validate email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		my_contact_form_generate_response("error", $email_invalid);
		else //email is valid
		{
			//validate presence of name and message
			if(empty($name) || empty($message)){
			  my_contact_form_generate_response("error", $missing_content);
			}
			else //ready to go!
			{
			  $sent = wp_mail($to, $subject, strip_tags($message), $headers);
			  if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
			  else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
			}
		}
	}
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);
?>


<div class="contact-form">
	<h1 class="centered">Ready when you are!</h1>
	<?php echo $response; ?>
	<form action="<?php get_site_url(); ?>" method="post">
		<br>
		<p>
			<select name="message_subject" class="form-subject">
				<br>
				<option value="General Inquiry">--What would you like to know about?--</option> 
				<option value="General Inquiry">General Inquiry </option>    
				<option value="Portfolio Request">Personal Online Portfolio</option>
				<option value="Buisness Site Request">Professional Buisness Site</option>
				<option value="Storefront Request">Online Storefront</option>
			</select>
		</p>
		<br>
		<label for="name">
			<input type="text" class="form-name" name="message_name" placeholder="Your Name" value="<?php echo esc_attr($_POST['message_name']); ?>">
		</label>
		
		<label for="message_email">
			<input type="text"  class="form-email" name="message_email" placeholder="Your Email" value="<?php echo esc_attr($_POST['message_email']); ?>">
		</label>
		<br>
		<p><label for="message_text">
			<br><textarea type="text" name="message_text" placeholder="Tell me a bit about your project."><?php echo esc_textarea($_POST['message_text']); ?></textarea>
		</label></p>
		
		<input type="hidden" name="submitted" value="1">
		<p><input class="contact_button" type="submit" value="Send Message!"></p>
	</form>
	
</div><!-- contact-form -->