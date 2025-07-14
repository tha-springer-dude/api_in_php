<?php


// Forces PHP to be strict with types (no auto-converting "123" to 123)
// If a type doesn’t match exactly, PHP throws an error instead of guessing
// This helps catch bugs early but only works if this line is at the very top
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$basepath = dirname(__DIR__);
$classfolder = "/vendor/";
require $basepath. $classfolder."autoload.php";

set_exception_handler("ErrorHandler::handleException");

$myui = new UiDefinitions;
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

//if($id != null){
echo $resource, ", ", $id."\n";

//}
//the method type to interact with the api
$method_type = $_SERVER["REQUEST_METHOD"];
echo "Method Type: ".$method_type;

if($resource != "tasks"){
    echo "\n"."sorry mate, wrong adress";
    /***
        We could write it directly by ourselfes
     */
    //header("HTTP/1.1 404 WTF DUDE");
    //Does the same as above but the protocol is not hardcoded
    
    header("{$_SERVER['SERVER_PROTOCOL']} 404 WTF DUDE");

    /***
        Or call the php builtin http_response_code function
     */
     //http_response_code(404);
     exit;
}


echo "\n";
//echo "<br />";
header("Content-type: application/json; charset=UTF8");

$controller = new TaskController;

$controller -> processsRequest($_SERVER['REQUEST_METHOD'], $id);


?>


