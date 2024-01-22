<?php
// start session et load les apis nécessaire
/*
$racine=str_repeat("../",substr_count(dirname($_SERVER['SCRIPT_NAME']),'/'));
require_once $racine."/loader.php";
*/
$NomEditeur="ECOLE WEB ET MOBILE";
$NomLogiciel="ERP";
$versionJS="1.0";


$apiKey_atlas="9St+WqOS20imErYrTDHOQY6ObNT+C+yv";

$urlCfaDock="https://apiopco.opcoserveur.fr/ApiEchangeCFA";
$urlCfaDock="https://www.cfadock.fr/api";

$service_status="/v1/status";
$service_etats="/v1/dossiers/etats";
$service_dossierListe="/v1/dossiers/liste";

/*
curl -X 'GET' \
'https://apiopco.opcoserveur.fr/ApiEchangeCFA/v1/dossiers/liste?numerosInternes=123' \
-H 'accept: application/json' \
-H 'EDITEUR: NomEditeur' \
-H 'LOGICIEL: NomLogiciel' \
-H 'VERSION: NuméroVersion' \
-H 'X-API-KEY: 545Gp2F5J8Z4kgvLXXt9SzgRaS…………
*/


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $urlCfaDock.$service_status,
    CURLOPT_RETURNTRANSFER => true,
    //CURLOPT_ENCODING => '',
    //CURLOPT_MAXREDIRS => 10,
    //CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => '',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'accept: application/json',
        'EDITEUR: '.$NomEditeur,
        'LOGICIEL: '.$NomLogiciel,
        'VERSION: '.$versionJS,
        'X-API-KEY: '.$apiKey_atlas,
    ),
));
$response=curl_exec($curl);
if (curl_errno($curl)) {
    echo curl_error($curl)."<br><br>";
}
$status=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);
if($response===false) {
    echo "erreur : status => ".$status;
    exit;
}
var_dump($response);
?>