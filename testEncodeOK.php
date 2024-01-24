<?php

//encodage clientid et pass
$client_id = '0oa6sxvjfdTqwFjOb0x7';
$client_secret = 'Pb3EDEuB8QgYXfcVuPOpA2m08EkAniTv0475EB0J8D0EPqEnG-oT8tdBsyRgMYFh';


// essai encodeage apres concatenation
// OK CELA MARCHE CEST BON POUR CA
$passphraseAEncoder = $client_id . ":" . $client_secret;
$encoded_auth = base64_encode($passphraseAEncoder);
echo $encoded_auth;