<?php
include_once 'operations.php';
$amount = security("total");
$inv = security("inv");
$number = "254".security("number");
$res = pay($amount,$inv,$number);
function pay($amount, $orderId, $phoneNumber)
{

    $consumer_key = 'yourkey';
    $client_secret = 'yoursecret';
    $passkey = 'yourpasskey';
    $shortcode = 'yourshortcode';
    $callbackurl = 'yourcallbackurl';
    $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    
    $credentials = base64_encode($consumer_key.":".$client_secret);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Basic ' . $credentials]); //setting a custom header
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response = curl_exec($curl);
    $token = json_decode($curl_response)->access_token;
    
    $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $token]);
    $timestamp = date('YmdHis');
    $password = base64_encode($shortcode . $passkey . $timestamp);
    $curl_post_data = [
        //Fill in the request parameters with valid values
        'BusinessShortCode' => $shortcode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'CommandID' => 'CheckIdentity',
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phoneNumber,
        'PartyB' => $shortcode,
        'PhoneNumber' => $phoneNumber,
        'CallBackURL' => 'https://vesencomputing.com/hj/callbackurl.php',
        'AccountReference' => $orderId,
        'TransactionDesc' => 'Payment for goods and services',
    ];
    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);
    return $response;
}
echo json_encode($res);
?>