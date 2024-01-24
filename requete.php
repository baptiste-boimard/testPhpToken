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
    CURLOPT_RETURNTRANSFER => true,
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

//Convertion du json en tableau associatif
$dataJsonToken = json_decode($response, true);
// Récupération du token
$token = $dataJsonToken["access_token"];
//echo "token : " . $token;

// Envoi de la requete Get pour récupérer le dossier
// Concatenation de l'url de la recette
$concat_url_recette = $url_recette . $url_service . $url_parameters . $numerosDossier;

$curlGet = curl_init();

curl_setopt_array($curlGet, array(
    CURLOPT_URL => $concat_url_recette,
    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'X-API-KEY: gzXkE1asecojw5KcqcDz2gN2iA3jcBXrrQCwxgVoAc58zHUPWT5urSjQz00dyKAM',
        'Authorization: Bearer ' . $token
    ),
));

$response = curl_exec($curlGet);

curl_close($curlGet);
echo $response;

//Convertion du json en tableau associatif
$dataJsonResponse = json_decode($response, true);
print_r($dataJsonResponse);

