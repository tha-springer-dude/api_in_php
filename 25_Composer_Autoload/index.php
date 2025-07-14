<?php
$basepath = dirname(__DIR__);
$classfolder = "/vendor/";
require $basepath. $classfolder."autoload.php";


$controller = new TaskController;

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
echo $resource, ", ", $id.$myui -> eol();

//}
//the method type to interact with the api
$method_type = $_SERVER["REQUEST_METHOD"];
echo "Method Type: ".$method_type;

if($resource != "tasks"){
    echo $myui -> eol()."sorry mate, wrong adress";
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


echo $myui -> eol();
//echo "<br />";
$controller -> processsRequest($_SERVER['REQUEST_METHOD'], $id);

?>


