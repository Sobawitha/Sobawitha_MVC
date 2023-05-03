<?php


require_once 'vendor/autoload.php';

\Stripe\Stripe::setApiKey("YOUR_SECRET_API_KEY");


$stripe_Settings = array
(
    'currency' => 'usd',
    'webhook_secret' => 'whsec_'
);

?>