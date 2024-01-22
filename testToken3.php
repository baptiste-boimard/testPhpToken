<?php

// Remplacez ces valeurs par les vôtres
$url = 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token';
$client_id = '0oa6sxvjfdTqwFjOb0x7';
$client_secret = 'Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh';

// Les données à envoyer dans la requête POST
$data = array(
    'grant_type' => 'client_credentials',
    'client_id' => $client_id,
    'client_secret' => $client_secret
);

// Configuration de la requête cURL
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Client id: ' . $client_id,
        'Client secret: ' . $client_secret,
    ),
);

// Initialisation de cURL
$ch = curl_init();
curl_setopt_array($ch, $options);

// Exécution de la requête
$response = curl_exec($ch);
echo "Reponse $response";
// Fermeture de la session cURL
curl_close($ch);

// Vérification des erreurs
if ($response === false) {
    die('Erreur cURL : ' . curl_error($ch));
}

// Convertir la réponse JSON en tableau associatif
$result = json_decode($response, true);

// Récupérer le token d'accès
$access_token = $result['access_token'];

// Utilisez le $access_token comme nécessaire dans vos appels d'API

?>
