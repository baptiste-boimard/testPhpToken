<?php

// Déclaration de nos variables
$tokenUrl = 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token';
$scope= 'scope: CFA_OPCO';
$contentType = 'Content-Type: application/x-www-form-urlencoded';
$clientId = '0oa6sxvjfdTqwFjOb0x7';
$clientSecret = 'Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh';
$contentType = 'Content-Type: application/x-www-form-urlencoded';
$grant_type = 'client_credentials';
$authorization = '';

//1ère étape : Convertion du clientId et du secret en base 64

$clientIdEncoded = base64_encode($clientId);
$clientSecretEncoded = base64_decode($clientSecret);

// Concaténation des 2 variables
$concatClient = $clientIdEncoded . '.' . $clientSecretEncoded;

// On stocke cela dons notre varaible autohrization;
$authorization = 'Authorization: Basic ' . $concatClient;

// On lance la requête
//$response = $(curl --location $tokenUrl --header $scope --header $contentType --header $authorization --data-urlencode 'grant_type=client_credentials');
//
//echo $response;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $tokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$headers = array(
    $contentType,
    $scope,
    $authorization,

);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

echo 'Response : ' . $response;