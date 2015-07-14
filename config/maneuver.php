<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ignored Files
    |--------------------------------------------------------------------------
    |
    | Maneuver will check .gitignore for ignore files, but you can conveniently
    | add here additional files to be ignored.
    |
    */
    'ignored' => [],

    /*
    |--------------------------------------------------------------------------
    | Default server
    |--------------------------------------------------------------------------
    |
    | Default server to deploy to when running 'deploy' without any arguments.
    | If this options isn't set, deployment will be run to all servers.
    |
    */
    'default' => 'production',

    /*
    |--------------------------------------------------------------------------
    | Connections List
    |--------------------------------------------------------------------------
    |
    | Servers available for deployment. Specify one or more connections, such
    | as: 'deployment', 'production', 'stating'; each with its own credentials.
    |
    */

    'connections' => [

        'production' => [
            'scheme'    => env('DEPLOYMENT_FTP_SCHEME'),
            'host'      => env('DEPLOYMENT_FTP_HOST'),
            'user'      => env('DEPLOYMENT_FTP_USER'),
            'pass'      => env('DEPLOYMENT_FTP_PASS'),
            'path'      => env('DEPLOYMENT_FTP_PATH'),
            'port'      => env('DEPLOYMENT_FTP_PORT'),
            'passive'   => true
        ],

    ],

];