<?php

session_start();

define("BASE_URL", "https://fad6-49-237-34-225.ap.ngrok.io/system_test/web/");
define("API_URL", "https://fad6-49-237-34-225.ap.ngrok.io/system_test/api/");

function curl_post($url, $data) {
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($cURLConnection);
    // curl_close($cURLConnection);
    
    // $apiResponse - available data from the API request
    // $jsonArrayResponse = json_decode($apiResponse);

    return $apiResponse;
}

function curl_get($url) {
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $phoneList = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    $jsonArrayResponse = json_decode($phoneList);

    return $jsonArrayResponse;
}
