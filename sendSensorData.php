<?php
/**
 * Send Data from the Arduino Sensors, which is currently stored as a textfile.
 * Parse the textfile into an associative array, then send as json data to remote server.
 * User: Hannah Greer
 * Date: 11/5/2016
 * Time: 12:15 PM
 */

$file = "/Users/RobCardy/Programming/tester/test.txt";
$fh = fopen($file, 'r');
$txtdata = fread($fh, filesize($file));
$data_array = array();
$arr = explode("\n", $txtdata);

$len = sizeOf($arr);

$data_array["phone"] = $arr[$len - 19];
$data_array["field"] = $arr[$len - 17];
$data_array["temp"]= $arr[$len - 15];
$data_array["humidity"] = $arr[$len - 13];
$data_array["nitrate"] = $arr[$len - 11];
$data_array["phosphorus"] = $arr[$len - 9];
$data_array["potassium"] = $arr[$len - 7];
$data_array["pH"] = $arr[$len - 5];
$data_array["light"] = $arr[$len - 3];
//$data_array["envTemp"] = ;
//$data_array["envHumidity"] = "0.69";
//$data_array["celsius"] = $arr[2];

echo $data_array["light"];

$json = json_encode($data_array);

$url = 'http://robcardy.com/fields/';

$ch = curl_init($url);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Have cURL follow redirects
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "hannah:horses11");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

//Execute the request
$result = curl_exec($ch);
echo $result;