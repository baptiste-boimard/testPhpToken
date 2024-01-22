<?php
$token_url = "https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token";
$client_id = "0oa6sxvjfdTqwFjOb0x7";
$client_secret = "Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh";
$grant_type = "client_credentials";

// Configuration de la requête cURL
$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic ' . base64_encode("$client_id:$client_secret")
));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'grant_type' => $grant_type
)));

// Exécution de la requête
$response = curl_exec($ch);
echo "Réponse $response";

// Vérification des erreurs
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

// Fermeture de la ressource cURL
curl_close($ch);

// Traitement de la réponse JSON
$data = json_decode($response, true);

// Affichage du token d'accès
if (isset($data['access_token'])) {
    echo 'Token d\'accès : ' . $data['access_token'];
} else {
    echo 'Erreur lors de la récupération du token d\'accès.';
}
?>
