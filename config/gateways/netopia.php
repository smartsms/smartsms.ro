<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Netopia Config
    |--------------------------------------------------------------------------
    |
    | The default netopia stuff
    |
    */

    'default' => [
        'apikey' => '09e7138ad22e3047f606f423e40c1487301b4da3',
        'secret' => '1f365c08893ca8d36cafb0645267a7df7fced81e5f6b7098333008bc802993034caa96a2da094d33165efd4ea73992807949121a5a82cff23ee01d8bea3385ac',
    ],
    '2way' => [
        'apikey' => '5298185ae4fec761e673ae5f96998e96da1ac37a',
        'secret' => '6194bba1a89605f33a9a754e934badb568ee5e2934be73268cd8fec04dec2af78e4d4e8434cf87aac28a117c9a209ba93eb53a3599c6cc99421599b8746514a0',
    ],



    'domain' => 'https://www.web2sms.ro',
    'path' => '/send/message',
    'https://s.smartsms.ro/?=',

    'error-messages' => [
        'IDS_App_Controller_Rest_Message__E_AUTH_REQUIRED' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_NO_DATA' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_NO_NONCE' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_WRONG_NONCE' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_NO_API_KEY' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_INVALID_REQUEST_API_KEY' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_ACCOUNT_DISABLED' => 'Va rugam luati legatura cu Account Managerul.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_ID_NOT_PROVIDED' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_App_Controller_Rest_Message__E_INVALID_REQUEST_DATA_WRONG_SIGNATURE' => 'Mesaj nelivrat, eroare la furnizor.',
        'IDS_Sms_MessageController__E_NOT_IMPLEMENTED' => 'metoda/verbul nu este implementat.',
        'IDS_Sms_MessageController_E_CS_INVALID_PARAMETER' => 'de verificat parametrii din cerere.',
        'IDS_Sms_MessageController_E_CS_INVALID_MSGID' => 'de verificat parametrii din cerere.',
        'IDS_Sms_MessageController_E_INTERNAL_ERROR' => 'Mesaj nelivrat, contactați Account Managerul.',
        'IDS_Sms_MessageController_E_IS_MAINTENANCE' => 'Necesita retry dupa flowul intern al clientului: aplicatia este in mentenanta.',
        'IDS_Sms_MessageController_E_FAILED_CREATE_SMS_SENDER' => 'de contactat Account Managerul pentru reconfigurare.',
        'IDS_Sms_MessageController_E_FAILED_INSTANTIATE_ACCOUNT' => 'de contactat Account Managerul pentru reconfigurare.',
        'IDS_Sms_MessageController_E_FAILED_POSTPAID_ONLY_ACCESS' => 'accesul este restrictionat conturilor de tip postpaid.',
        'IDS_Sms_MessageController_E_INVALID_MSISDN' => 'numar incorect. Verificati cererea.',
        'IDS_Sms_MessageController_E_BLACK_LISTED' => 'Numarul este blacklisted.',
        'IDS_Sms_MessageController_E_INVALID_REQUEST_DATA_WRONG_VALIDITY_VALUE' => 'de verificat cererea la parametrul valabilitate.',
        'IDS_Sms_MessageController_E_NO_VCN_OR_SENDER' => 'de contactat Account Managerul. Posibil sa existe o problema de configurare cont.',
        'IDS_Sms_MessageController_E_OVERLIMIT_MESSAGE' => 'de contactat Account Managerul. S-a depasit limita de mesaje per cont.',
        'IDS_Sms_MessageController_E_OUTSIDE_TIME_LIMIT' => 'Necesita retry conform flow aplicatie client: mesajul este programat in afara limitelor orare setate la nivel de cont.',
        'IDS_Sms_MessageController_E_OUTSIDE_LIMIT' => 'Necesita retry conform flow aplicatie client: mesajul este programat in afara limitelor  setate la nivel de cont.',
        'IDS_Sms_MessageController_E_EMPTY_MESSAGE' => 'verificati cererea parametru mesaj.',
        'IDS_Sms_MessageController_E_MESSAGE_NOT_ALLOWED' => 'Mesajul contine cuvinte nepermise de catre operatori.',
        'IDS_Sms_MessageController_E_MESSAGE_VALABILITY_EARLIER_THEN_SCHEDULED' => 'de verificat cererea pentru parametrii data programarii si valabilitate mesaj.',
        'IDS_Sms_MessageController_E_MESSAGE_VALABILITY_LATER_THEN_MAX_ALLOWED' => 'de verificat cererea pentru parametru valabilitate mesaj.',
        'IDS_Sms_MessageController_E_DB_DUPLICATE_ENTRY' => 'Mesaj nelivrat. Cerere duplicată.',
        'IDS_Sms_MessageController_E_REGISTER_SMS' => 'mesajul nu a fost salvat in baza de date. Pentru detalii suplimentare contactati Account Managerul.',
        'IDS_Sms_MessageController_E_API_REQUEST_NUMBER_LIMIT_EXCEEDED' => 'Necesita retry. S-a depasit limita de request-uri concurente per secunda la nivel de cont.',
        'IDS_Sms_MessageController_E_OUTSIDE_DATE_LIMIT' => 'Necesita retry conform flow aplicatie client: mesajul este programat in afara limitelor de zi setate la nivel de cont.',
        'IDS_Sms_MessageController_E_CONFIG_DATE_LIMIT_ERROR' => 'De luat legatura cu Account Managerul. Exista o problema de configurare la nivelul limitelor la nivel de zi.',
    ],

];
