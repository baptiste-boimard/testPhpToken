<?php

//require 'vendor/autoload.php'; // Chargement de l'autoloader de Composer
//
//use Firebase\JWT\JWT;
//
//// Remplacez ces valeurs par les informations de votre requête
//$httpMethod = "POST";
//$url = "https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token";
//$clientSecret = "Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh";
//
//// Générez un nonce unique (peut également être un timestamp)
//$nonce = uniqid();
//
//// Générez le DPoP proof JWT
//$dpopPayload = [
//    "htm" => strtoupper($httpMethod),
//    "path" => $url,
//    "iat" => time(),
//    "exp" => time() + 3000,  // Expire dans 60 secondes (ajustez selon vos besoins)
//    "jti" => $nonce,
//];
//
//// Encodez le JWT
//$dpopToken = JWT::encode($dpopPayload, $clientSecret, 'HS256');  // Utilisez HS256 pour un secret partagé (ajustez selon votre configuration)
//
//echo "DPoP Token: " . $dpopToken . PHP_EOL;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token',
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
    CURLOPT_HTTPHEADER => array(
        'scope: CFA_OPCO',
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic MG9hNnN4dmpmZFRxd0ZqT2IweDc6UGIzRURFdUI4UWdZWGZjVnVQT3BBMm0wOEVrQW5pVHYwNDc1RUIwSjhEMEVQcUVuRy1vVDh0ZEJzeVJnTVlGaA==',
//        'DPoP: ' . $dpopToken,
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;