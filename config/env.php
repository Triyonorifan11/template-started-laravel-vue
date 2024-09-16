<?php

return [
    'midtrans_base_url' => env('MIDTRANS_BASE_URL', 'https://app.sandbox.midtrans.com'),
    'midtrans_merchant_id' => env('MIDTRANS_MERCHANT_ID', 'G957025026'),
    'midtrans_client_id' => env('MIDTRANS_CLIENT_ID', 'SB-Mid-client-fvaCie4583zvZ2_a'),
    'midtrans_server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-Sa9s05ucJuzediWL7yHjQNag'),
    'midtrans_server_password' => env('MIDTRANS_SERVER_PASSWORD', ''),

    // https://docs.midtrans.com/reference/override-notification-url
    'midtrans_append_notification_url' => env('MIDTRANS_APPEND_NOTIFICATION_URL', ''),
    'midtrans_override_notification_url' => env('MIDTRANS_OVERRIDE_NOTIFICATION_URL', ''),

    'recaptcha_key' => [
        'secret' => env('RECAPTCHA_SECRET_KEY', false),
        'site' => env('RECAPTCHA_SITE_KEY', false),
    ],

    'default_password' => env('DEFAULT_PASSWORD', '123456'),
];
