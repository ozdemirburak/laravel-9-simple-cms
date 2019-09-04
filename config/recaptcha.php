<?php

/**
 * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
 */
return [

    /**
     * The site key
     * get site key @ www.google.com/recaptcha/admin
     */
    'api_site_key' => env('RECAPTCHA_SITEKEY'),

    /**
     * The secret key
     * get secret key @ www.google.com/recaptcha/admin
     */
    'api_secret_key' => env('RECAPTCHA_SECRET'),

    /**
     * ReCATCHA version
     * Supported: "v2", "invisible", "v3",
     *
     * get more info @ https://developers.google.com/recaptcha/docs/versions
     */
    'version' => env('RECAPTCHA_DEFAULT_VERSION', 'v2'),

    /**
     * The curl timout in seconds to validate a recaptcha token
     * @since v3.5.0
     */
    'curl_timeout' => env('RECAPTCHA_CURL_TIMEOUT', 10),

    /**
     * IP addresses for which validation will be skipped
     */
    'skip_ip' => [],

    /**
     * Default route called to check the Google reCAPTCHA token
     * @since v3.2.0
     */
    'default_validation_route' => env('RECAPTCHA_DEFAULT_VALIDATION_ROUTE', 'biscolab-recaptcha/validate'),

    /**
     * The name of the parameter used to send Google reCAPTCHA token to verify route
     * @since v3.2.0
     */
    'default_token_parameter_name' => env('RECAPTCHA_DEFAULT_TOKEN_PARAMETER_NAME', 'token'),

    /**
     * The default Google reCAPTCHA language code
     * It has no effect with v3
     * @see   https://developers.google.com/recaptcha/docs/language
     * @since v3.6.0
     */
    'default_language' => env('RECAPTCHA_DEFAULT_LANGUAGE', null)
];
