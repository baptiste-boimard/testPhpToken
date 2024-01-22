<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.cfadock.fr/v1/status',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => array(
        'accept: text/plain',
        'EDITEUR: NomEditeur',
        'LOGICIEL: NomLogiciel',
        'VERSION: NuméroVersion',
        "X-API-KEY: 9St+WqOS20imErYrTDHOQY6ObNT+C+yv",
    ),
));

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
    echo "Erreur cURL : " . $error;
}
var_dump($response);


?>
