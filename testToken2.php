<?php
$token_url = "https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token";
$client_id = "0oa6sxvjfdTqwFjOb0x7";
$client_secret = "Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh";
$grant_type = "client_credentials";

// Générer une paire de clés pour DPoP (une clé privée et une clé publique)
$config = array(
    "digest_alg" => "sha256",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

$private_key = openssl_pkey_new($config);

// Générer le JWT DPoP
$jwt_header = base64url_encode(json_encode(array('alg' => 'RS256', 'typ' => 'dpop+jwt')));
$jwt_payload = base64url_encode(json_encode(array('jti' => '123456789', 'htm' => 'POST', 'path' => '/oauth/token')));

// Concaténer le header et le payload
$data_to_sign = $jwt_header . '.' . $jwt_payload;

// Signer les données avec la clé privée
openssl_sign($data_to_sign, $jwt_signature, $private_key, OPENSSL_ALGO_SHA256);

// Encoder la signature en base64url
$jwt_signature_base64url = base64url_encode($jwt_signature);
echo 'auth' . $jwt_signature_base64url;

// Construire le JWT DPoP final
//$dpop_jwt = $data_to_sign . '.' . $jwt_signature_base64url;

// Configuration de la requête cURL
//$ch = curl_init($token_url);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//    'Content-Type: application/x-www-form-urlencoded',
//
//    'Authorization: Basic ' . base64_encode("$client_id:$client_secret"),
//    'scope: CFA_OPCO'
//));
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
//    'grant_type' => $grant_type
//)));


//$ch = curl --location 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token' \
//--header 'scope: CFA_OPCO' \
//--header 'Content-Type: application/x-www-form-urlencoded' \
//--header 'Authorization: Basic XXXXXXXXXX' \
//--data-urlencode 'grant_type=client_credentials


// Exécution de la requête
//$response = curl_exec($ch);
//echo 'Response' . $response;

// Vérification des erreurs
//if (curl_errno($ch)) {
//    echo 'Erreur cURL : ' . curl_error($ch);
//}

// Fermeture de la ressource cURL
//curl_close($ch);

//// Traitement de la réponse JSON
//$data = json_decode($response, true);
//
//// Affichage du token d'accès
//if (isset($data['access_token'])) {
//    echo 'Token d\'accès : ' . $data['access_token'];
//} else {
//    echo 'Erreur lors de la récupération du token d\'accès.';
//}
//
//// Fonction d'encodage URL sécurisée pour la preuve DPoP
//function base64url_encode($data) {
//    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
//}
?>

/*
1 -> convertir les client id client secret en base 64
se termine par ==
2- concatenation du resultats par un basic authentification avec variable Authorization
    - authorization => 'Authorization: Basic (résultat conversion)'
3- decalaration de variable
    - urlToken => 'https://afdas-sandbox.oktapreview.com/oauth2/aus3xuvkgttKcUPow0x7/v1/token'
    - scope => 'scope: CFA_OPCO'
    - contentType => 'Content-Type: application/x-www-form-urlencoded'


4- creation commande curl
curl --location $urlToken --header $scope --header $contentType --header $authorization --data-urlencode 'grant_type=client_credentials'


GET =>

curl --location 'https://api-cfa-recette.afdas.com/v1/dossiers?numeroExterne=CA-0150926-1' \

--header 'X-Api-Key: XXXXXXXXXXXXX' \

--header 'accept: application/json' \

--header 'Content-Type: application/json' \

--header 'Authorization: Bearer XXXXXXXXXXX'

*/
