<?php

return [
    'secret' => env('GOOGLE_NOCAPTCHA_SECRET'),
    'sitekey' => env('GOOGLE_NOCAPTCHA_SITEKEY'),
    'options' => [
        'timeout' => 30,
    ],
];
