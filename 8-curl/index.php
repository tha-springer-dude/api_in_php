<?php

$ch = curl_init();

// YOU CAN SET THE OPTIONS LINE BY LINE
//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// OR YOU CAN SET THE OPTIONS IN AN ARRAY
curl_setopt_array($ch, [
    CURLOPT_URL => "https://randomuser.me/api",
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);

curl_close($ch);

echo $response, "\n";