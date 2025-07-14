<?php
// returns the PATH part of the URL
// basicly everything after the hostname
$theURL = $_SERVER["REQUEST_URI"];
$theParsedURL = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

/*
if URL is ocalhost/php_api_tut/api_in_php/tasks?page=1

output of the URL is ocalhost/php_api_tut/api_in_php/tasks?page=1
 */
//echo "<strong>the raw url</strong> ".$theURL."<br />";

/*
if URL is ocalhost/php_api_tut/api_in_php/tasks?page=1

output of the URL is ocalhost/php_api_tut/api_in_php/tasks

query string is removed
 */
//echo "<strong>the parsed url</strong>".$theParsedURL;

$parts = explode ("/", $theParsedURL);

$resource = $parts[4];
//print_r($parts);
//echo "<br />";
//echo $parts[4];
$id = $parts[5] ?? null;

echo $resource, ", ", $id;
echo "<br />";
//the method type to interact with the api
$method_type = $_SERVER["REQUEST_METHOD"];
echo $method_type;
?>


