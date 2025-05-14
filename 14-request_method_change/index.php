<?php

$ch = curl_init();

$headers = [
    "Authorization: token YOUR_TOKE_HERE"
];

curl_setopt_array($ch, [
    //CURLOPT_URL => "https://api.github.com/user/starred/httpie/httpie",
    CURLOPT_URL => "https://api.github.com/user/starred/httpie/cli",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => "tha-springer-dude",
    CURLOPT_CUSTOMREQUEST => "PUT"
]);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo $status_code, "\n";

echo $response, "\n";










