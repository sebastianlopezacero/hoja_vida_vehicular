<?php
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC53bb048f467a724efa454065188c75ec';
$token = '28be2ac3851f11a97a8a216432a81971';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+573153379497',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12058595026',
        // the body of the text message you'd like to send
        'body' => "Mi primer mensaje de pruba!"
    ]
);
