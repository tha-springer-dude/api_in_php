<?php

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'https://api.stripe.com/v1/customers',
    CURLOPT_RETURNTRANSFER => true,
]);

$response = $curl_exec($ch);

curl_close($ch);

echo $response;