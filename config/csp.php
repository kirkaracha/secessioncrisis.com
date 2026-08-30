<?php

declare(strict_types=1);

use Spatie\Csp\Nonce\RandomString;
use Spatie\Csp\Presets\Basic;

return [

    /*
     * Presets will determine which CSP headers will be set. A valid CSP preset is
     * any class that implements `Spatie\Csp\Preset`
     */
    'presets' => [
        Basic::class,
    ],

    /**
     * Register additional global CSP directives here.
     */
    'directives' => [
        // [Directive::SCRIPT, [Keyword::UNSAFE_EVAL, Keyword::UNSAFE_INLINE]],
    ],

    /*
     * These presets which will be put in a report-only policy. This is great for testing out
     * a new policy or changes to existing CSP policy without breaking anything.
     */
    'report_only_presets' => [
        //
    ],

    /**
     * Register additional global report-only CSP directives here.
     */
    'report_only_directives' => [
        // [Directive::SCRIPT, [Keyword::UNSAFE_EVAL, Keyword::UNSAFE_INLINE]],
    ],

    /*
     * All violations against a policy will be reported to this url.
     * A great service you could use for this is https://report-uri.com/
     */
    'report_uri' => env(key: 'CSP_REPORT_URI', default: ''),

    /*
     * Optional separate report url for the report-only policy. When empty,
     * the report-only policy falls back to `report_uri` above. Useful for
     * services like report-uri.com that require different paths for enforcing
     * (`/enforce`) and report-only (`/reportOnly`) policies.
     */
    'report_only_uri' => env(key: 'CSP_REPORT_ONLY_URI', default: ''),

    /*
     * The name of the reporting endpoint that violations should be sent to.
     * The endpoint itself must be defined in `reporting_endpoints` below.
     */
    'report_to' => env(key: 'CSP_REPORT_TO', default: ''),

    /*
     * Optional separate reporting endpoint name for the report-only policy.
     * When empty, the report-only policy falls back to `report_to` above.
     */
    'report_only_to' => env(key: 'CSP_REPORT_ONLY_TO', default: ''),

    /*
     * Reporting endpoints that will be sent in the `Reporting-Endpoints` HTTP
     * header. The keys are the endpoint names that can be referenced from
     * `report_to` above.
     *
     * Example: ['default' => 'https://example.com/csp-reports']
     */
    'reporting_endpoints' => [
        //
    ],

    /*
     * Headers will only be added if this setting is set to true.
     */
    'enabled' => env(key: 'CSP_ENABLED', default: true),

    /**
     * Headers will be added when Vite is hot reloading.
     */
    'enabled_while_hot_reloading' => env(key: 'CSP_ENABLED_WHILE_HOT_RELOADING', default: false),

    /*
     * The class responsible for generating the nonces used in inline tags and headers.
     */
    'nonce_generator' => RandomString::class,

    /*
     * Set false to disable automatic nonce generation and handling.
     * This is useful when you want to use 'unsafe-inline' for scripts/styles
     * and cannot add inline nonces.
     * Note that this will make your CSP policy less secure.
     */
    'nonce_enabled' => env(key: 'CSP_NONCE_ENABLED', default: true),
];
