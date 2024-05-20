<?php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );


  $apiKey         = wellnesscenter_get_option('mailchimp_api'); // Edit me
  $listId         = wellnesscenter_get_option('mailchimp_id'); // Edit me
  $double_optin   = true;
  $send_welcome   = true;
  $email_type     = 'html';
  $email          = $_POST['email'];
  $fname          = '';
  $lname          = '';
  $us             = explode('-', $apiKey);

  // Replace us8 with your datacentre, usually found at end of api key
  $submit_url     = "http://".$us[1].".api.mailchimp.com/1.3/?method=listSubscribe";

  $data = array(
      'email_address'=>$email,
      'merge_vars' => array('FNAME'=>$fname, 'LNAME'=>$lname),
      'apikey'=>$apiKey,
      'id' => $listId,
      'double_optin' => $double_optin,
      'send_welcome' => $send_welcome,
      'email_type' => $email_type
  );
  $payload = json_encode($data);
   
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $submit_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
   
  $result = curl_exec($ch);
  curl_close ($ch);
  $data = json_decode($result);

  if (isset($data->error)){
    echo '<p class="sub-form-error alert alert-danger text-center">'.$data->error.'</p>';
  } else {
    echo "<p class='sub-form-success alert alert-success text-center'>Awesome! We sent you a confirmation email.</p>";
  }
?>