<?php

// Définition des variables
$client_id = '0oa6sxvjfdTqwFjOb0x7';
$client_secret = 'Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh';
$url_token = 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token';
$url_recette = 'https://api-cfa-recette.afdas.com';
$url_service = '/v1/dossiers';
$url_parameters = '?numeroExterne=';
$numerosDossier = 'CA-0098569-1';

// Récupération du token
// Encodage en base64 du client_id et client_secret
$encoded_auth = base64_encode($client_id . ":" . $client_secret);

// Envoi de la requete pour récupérer le token
$curlToken = curl_init();

curl_setopt_array($curlToken, array(
    CURLOPT_URL => $url_token,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
    CURLOPT_HTTPHEADER => array(
        'scope: CFA_OPCO',
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic ' . $encoded_auth,
    ),
));

$response = curl_exec($curlToken);

curl_close($curlToken);
echo $response;

//Convertion du json en tableau associatif
$dataJson = json_decode($response, true);

// Récupération dans du token
$token = $dataJson['access_token'];