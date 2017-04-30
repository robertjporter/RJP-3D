<?php
// Input Your Personal Information Here
$mailto = "sparkleraptor@gmail.com" ;
$from = "RobertJPorter.com" ;
$formurl = "<?php bloginfo('template_url'); ?>/form/SecureMail.php" ;
$errorurl = "<?php bloginfo('template_url'); ?>" ;
$thankyouurl = "<?php bloginfo('template_url'); ?>" ;
// End Edit

// prevent browser cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

function remove_headers($string) { 
  $headers = array(
    "/to\:/i",
    "/from\:/i",
    "/bcc\:/i",
    "/cc\:/i",
    "/Content\-Transfer\-Encoding\:/i",
    "/Content\-Type\:/i",
    "/Mime\-Version\:/i" 
  ); 
  if (preg_replace($headers, '', $string) == $string) {
    return $string;
  } else {
    die('You think Im spammy? Spammy how? Spammy like a clown, spammy?');
  }
}

$uself = 0;
$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;

if (!isset($_POST['email'])) {
	header( "Location: $errorurl" );
	exit ;
}

// Input Your Personal Information Here
$name = remove_headers($_POST['name']);
$email = remove_headers($_POST['email']);
$subject = remove_headers($_POST['subject']);
$comments = remove_headers($_POST['comments']);
$http_referrer = getenv( "HTTP_REFERER" );
// End Edit

if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i",$email)) {
header( "Location: $errorurl" );
    exit ;
}

// Input Your Personal Information Here
if (empty($name) || empty($email) || empty($subject) ||empty($comments)) {
   header( "Location: $errorurl" );
   exit ;
}
// End Edit

if ( ereg( "[\r\n]", $name ) || ereg( "[\r\n]", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

// sets max amount of characters in comments area (edit as nesesary)
if (strlen($comments) > 1250) {
$comments=substr($comments, 0, 1250).'...';
}
// End Edit

$message =
	"This message was sent from:\n" .
	"$http_referrer\n\n" .
	
	// Input Your Personal Information Here
	"Name: $name\n\n" .
	"Email: $email\n\n" .
	"Subject: $subject\n\n" .
	"Comments: $comments\n\n" .
	"\n\n------------------------------------------------------------\n" ;
	// End Edit

mail($mailto, $from, $message,
	"From: \"$name\" <$email>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep );
header( "Location: $thankyouurl" );
exit ;

?>
	