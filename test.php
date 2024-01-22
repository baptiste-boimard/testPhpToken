<?php

//Exemple de requete trouver sur l'Api
/*
curl -X 'GET' \
'https://apiopco.opcoserveur.fr/ApiEchangeCFA/v1/dossiers/liste?numerosInternes=123' \
-H 'accept: application/json' \
-H 'EDITEUR: NomEditeur' \
-H 'LOGICIEL: NomLogiciel' \
-H 'VERSION: NuméroVersion' \
-H 'X-API-KEY: 545Gp2F5J8Z4kgvLXXt9SzgRaS…………
*/
// Variable école
$nomEditeur = "NWS";
$nomLogiciel = "ERP";
$version = "1.0";
// URL de l'API
$apiUrl = "https://api-cfa-recette.afdas.com/v1/status";
// Api key Atlas
$apiKey_afdas="gzXkE1asecojw5KcqcDz2gN2iA3jcBXrrQCwxgVoAc58zHUPWT5urSjQz00dyKAM";
$apiKey_atlas="/hISynBC3EjrMFfD/vLIRqYoefhQN0+1";


// Configuration de la requête cURL
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => '',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'accept: application/json',
        'EDITEUR: '.$nomEditeur,
        'LOGICIEL: '.$nomLogiciel,
        'VERSION: '.$version,
        'X-API-KEY: '.$apiKey_afdas,
    ),
));


// Exécution de la requête
$response = curl_exec($curl);

// Vérification des erreurs
if (curl_errno($curl)) {
    echo 'Erreur cURL : ' . curl_error($curl);
}

// Récupération des informations de la requête cURL
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//$contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);

// Fermeture de la session cURL
curl_close($curl);

if($response===false) {
    echo "erreur : status => ".$httpCode;
    exit;
}
echo "Réponse => $response";
echo "status => $httpCode";
//var_dump($response);
?>