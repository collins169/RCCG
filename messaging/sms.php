<?php
/**
 * Created by PhpStorm.
 * User: Collins
 * Date: 15/12/2018
 * Time: 9:47 PM
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$From = 'Fasyl';
$To = '233240106094';
$Contents = 'Testing Sms Api for Protocol From AMB Protocol';
$Content= str_replace(' ','+', $Contents);
//$ClientId = 'hgvyufsq';
//$ClientSecret = 'walcrhho';
$ClientId = 'Fasyl';
$Password = 'Fasyl@123';

$posturl = 'https://api.smsgh.com/v3/messages/send?From=AMBProtocol&To=0263213622&Content=Hello,world!&ClientId=hgvyufsq&ClientSecret=walcrhho&RegisteredDelivery=true';
$url = 'https://sms.wirepick.com/httpsms/send?client='.$ClientId.'&password='.$Password.'&phone='.$To.'&text='.$Content.'&from='.$From.'';
//$postUrl = 'https://api.hubtel.com/v1/messages/send?From='.(string)$From.'&To='.$To.'&Content='.$Content.'&ClientID='.$ClientId.'&ClientSecret='.$ClientSecret.'&RegisteredDelivery=true';
function curl_get_contents($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function Parse ($url) {

    $fileContents= file_get_contents($url);

    $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

    $fileContents = trim(str_replace('"', "'", $fileContents));

    $simpleXml = simplexml_load_string($fileContents);

    $json = json_encode($simpleXml);

    return $json;

}
//$response = simplexml_load_file(urlencode($url));
//$response= simplexml_load_file(urlencode($url));
//echo simplexml_load_file($response);
//$status=$response->status;
//$msgid = $response->msgid;
//echo json_encode(array('status'=>$status,'response'=>$msgid));

//$json = curl_get_contents($url);
$resp = Parse($url);
//print_r($resp);

echo (integer)"hellowordl";
stat
//$ch = curl_init();
//$header = array("Content-Type:application/json", "Accept:application/json");
//// setting options
//curl_setopt($ch, CURLOPT_URL, $postUrl);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//// response of the POST request
//$response = curl_exec($ch);
//$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//$responseBody = json_decode($response);
//print_r($responseBody);
//curl_close($ch);
