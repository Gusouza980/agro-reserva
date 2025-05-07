<?php

$env = env('AGRISK_ENV', 'homologacao');

if ($env === 'homologacao') {
    return [
        'company_name' => env('AGRISK_COMPANY_NAME'),
        'company_id' => env('AGRISK_COMPANY_ID'),
        'company_taxid' => env('AGRISK_COMPANY_TAXID'),
        'env' => $env,
        'url' => env('AGRISK_HOMOLOG_URL', 'https://agrisk-api.nagro.link/'),
        'url_terms' => env('AGRISK_HOMOLOG_URL_TERMS', 'https://scr-auth-v2.nagro.link/'),
        'apiary_credential' => env('AGRISK_APIARY_HOMOLOG_CREDENTIAL'),
        'apiary_password' => env('AGRISK_APIARY_HOMOLOG_PASSWORD'),
    ];
} else {
    return [
        'company_name' => env('AGRISK_COMPANY_NAME'),
        'company_id' => env('AGRISK_COMPANY_ID'),
        'company_taxid' => env('AGRISK_COMPANY_TAXID'),
        'env' => $env,
        'url' => env('AGRISK_URL', 'https://api.agrisk.digital/'),
        'url_terms' => env('AGRISK_URL_TERMS', 'https://scr-auth-v2.agrisk.digital/'),
        'apiary_credential' => env('AGRISK_APIARY_CREDENTIAL'),
        'apiary_password' => env('AGRISK_APIARY_PASSWORD'),
    ];
}
?>