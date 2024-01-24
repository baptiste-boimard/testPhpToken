<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api-cfa-recette.afdas.com/v1/dossiers?numeroDeca=076202207063832',
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'X-API-KEY: gzXkE1asecojw5KcqcDz2gN2iA3jcBXrrQCwxgVoAc58zHUPWT5urSjQz00dyKAM',
        'Authorization: Bearer eyJraWQiOiJPXzdLVFRUbVhWQzFqc2NodDlmZ2I1ZTdWNE9teTBUa3hjemFNaFJHeFBVIiwiYWxnIjoiUlMyNTYifQ.eyJ2ZXIiOjEsImp0aSI6IkFULmRRd3JDd0h6QzFiNkVZZXdTQWtPQlpyUjBLRFlGcFFTN3pid0NLc2ZJaDAiLCJpc3MiOiJodHRwczovL2FmZGFzLXNhbmRib3gub2t0YXByZXZpZXcuY29tL29hdXRoMi9hdXMzeHV2a2d0dEtjVVBvdzB4NyIsImF1ZCI6IkFsbCIsImlhdCI6MTcwNjAxOTA2NywiZXhwIjoxNzA2MTA1NDY3LCJjaWQiOiIwb2E2c3h2amZkVHF3RmpPYjB4NyIsInNjcCI6WyJDRkFfT1BDTyJdLCJzdWIiOiIwb2E2c3h2amZkVHF3RmpPYjB4NyJ9.lE4aDqJcFPwzCTsQg-fUpSzYXkxNv8ifN3JGFFtRsTi7oy-Of172FGkdLobtaFXwKUgZGcofoJD_ZJcwr76r1WHE46SoHBQLytHyCW7IX8VDfuAJ6jbrZiB944eRnQkb1RUj9gme4WxKjb8BJ-inoNaH3kGDhJkbgLcK8XtRITVVgkenzGucrdaL0l3_Ai7c1TLxwcsoncCMAe1n3Z3m3kjMdMbFBT0fmA2Kzt3mE8PDHfMKETIu-3P3ytW9wjEAZT3NoQcRihYVTbr7Yk-ZQeld-wYZz8oPxWPoD_en53GlNNP0rw-qQJztKUPEFIDS-W-KgyUtTlc_5R6B99bQwQ',
        'accept: application/json',
        'Content-Type: application/JSON',
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
