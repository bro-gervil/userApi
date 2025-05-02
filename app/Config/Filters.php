<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;


class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, string>
     * @phpstan-var array<string, class-string>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'session'       => \CodeIgniter\Shield\Filters\SessionAuth::class,
        'tokens'        => \CodeIgniter\Shield\Filters\TokenAuth::class,
        'chain'         => \CodeIgniter\Shield\Filters\ChainAuth::class,
        'auth-rates'    => \CodeIgniter\Shield\Filters\AuthRates::class,
        'shield'        => \CodeIgniter\Shield\Filters\SessionAuth::class,
       //'firewall' => \Shieldon\Firewall\Integration\CodeIgniter4::class,
    ];



    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
           // 'firewall',
            //'honeypot',

            // 'invalidchars',
            'session' => 
            [
                'except' => [
                            'login*', 'register','auth/a/*'
                            ]
                        ],
        ],
        'after' => [
           
            'toolbar',
             'honeypot',
            'secureheaders',
           //'firewall',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [
        'GET' => ['csrf'],
        'POST' => ['csrf'],
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'auth-rates' => [
            'before' => [
                'login*', 'register', 'auth/*',

            ]
            ],

        'csrf' => [
            'before' => [
                '/(:segment)',
            ]
        ]
    ];
}

