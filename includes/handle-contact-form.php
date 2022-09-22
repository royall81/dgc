
<?php // Check if form was submitted:

  //print_r($_POST); exit;

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfYZQEVAAAAACp4kPCXddjwab8pr4xGTkAJ4QEr';
    $recaptcha_response = $_POST['recaptcha_response'];
    $redirect= "https://{$_SERVER['HTTP_HOST']}/{$_GET['redirect']}";
    // $url = $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response;
    $url = $recaptcha_url;
    $data = ['secret'   => '6LfYZQEVAAAAACp4kPCXddjwab8pr4xGTkAJ4QEr',
             'response' => $_POST['g-recaptcha-response'],
             'remoteip' => $_SERVER['REMOTE_ADDR']];

    // use key 'http' even if you send the request to https://...
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    $needles = json_decode(file_get_contents('https://dutchgroundcontrol.com/ContactBlockWords.json'));

    foreach ($needles->needles as &$needle) {

      if (strpos(strtolower($_POST['contact-subject']), $needle) !== false) {

        header("Location: {$redirect}", true, 301);
        exit();

      }

      if (strpos(strtolower($_POST['contact-email']), $needle) !== false) {

        header("Location: {$redirect}", true, 301);
        exit();

      }

      if (strpos(strtolower($_POST['contact-name']), $needle) !== false) {

        header("Location: {$redirect}", true, 301);
        exit();

      }

    }
	
	if(str_word_count($_POST['contact-message']) <= 4){
		header("Location: {$redirect}", true, 301);
		exit();
	}

    // // Take action based on the score returned:
    if ($result['score'] <= 0.5 && $result['score'] == false && !empty($request->get('check'))){ // if unsuccessfull

         header("Location: {$redirect}", true, 301);
         exit();

    }

  }

  // print_r($redirect); exit;


  if (isset($_POST['contact-name']) && isset($_POST['contact-email']) && isset($_POST['contact-subject']) && isset($_POST['contact-message']) )  {

    $to       = 'postmaster@cronjobmail.com;';
    $subject  = $_POST['contact-subject'];

    $message = 'Bericht van: '.$_POST['contact-email'].'<br /><br />';
    $message .= 'Bericht: <br /><br />'.nl2br($_POST['contact-message']).'<br /><br />';

    $replyToEmailName    = $_POST['contact-email'];
    $replyToEmailAddress = $_POST['contact-email'];

    // compose headers
    $headers = "From: DGC Contact form <info@dutchgroundcontrol.com>\r\n";
    $headers .= "Reply-To: ".$replyToEmailAddress."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion()."\r\n";
    $headers  .= "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1"."\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: {$redirect}", true, 301);
    exit();
  }

  if (isset($_POST['retail-name']) && isset($_POST['retail-company']) && isset($_POST['retail-phone']))  {

    $to       = 'postmaster@cronjobmail.com;';
    $subject  = 'Become a retailer';

    $message = 'Klant Naam: '.$_POST['retail-name'].'<br />';
    $message .= 'Klant Bedrijf: '.$_POST['retail-company'].'<br />';
    $message .= 'Klant Email: '.$_POST['retail-email'].'<br />';
    $message .= 'Klant Phone: '.$_POST['retail-phone'].'<br />';
    $message .= 'Klant Website: '.$_POST['retail-url'].'<br />';
    $message .= 'Sample: '.$_POST['retail-sample'].'<br />';
    $message .= 'Klant Straat: '.$_POST['retail-street'].'<br />';
    $message .= 'Klant Postalcode: '.$_POST['retail-postalcode'].'<br />';
    $message .= 'Klant City: '.$_POST['retail-city'].'<br />';
    $message .= 'Klant Country: '.$_POST['retail-country'].'<br />';
    $message .= 'Bericht: <br /><br />'.nl2br($_POST['retail-message']).'<br /><br />';

    $email = $_POST['retail-email'];

    $headers = "From: DGC Contact form <info@dutchgroundcontrol.com>\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion()."\r\n";
    $headers  .= "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1"."\r\n";

    mail($to, $subject, $message, $headers);
    header("Location: {$redirect}", true, 301);
    exit;
  }




  ?>
