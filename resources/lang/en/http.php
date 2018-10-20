<?php

return [
    // Source: https://httpstatuses.com
    '403' => [
        'title'       => '403 - Forbidden',
        'description' => 'The server understood the request but refuses to authorize it.',
    ],
    '404' => [
        'title'       => '404 - Not Found',
        'description' => 'The origin server did not find a current representation for the target resource or is not willing to disclose that one exists.',
    ],
    '500' => [
        'title'       => '500 - Internal Server Error',
        'description' => 'The server encountered an unexpected condition that prevented it from fulfilling the request.',
    ],
    '503' => [
        'title'        => '503 - Service Unavailable',
        'description'  => 'The server is currently unable to handle the request due to a temporary overload or scheduled maintenance, which will likely be alleviated after some delay.',
    ]
];
