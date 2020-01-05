<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'crypt' => [
        'key' => '5ab6afba53f35c824c12bcb9ff8ed799'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'mysql',
                'dbname' => 'magento',
                'username' => 'root',
                'password' => 'root',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1'
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'default',
    'session' =>
        [
            'save' => 'redis',
            'redis' =>
            [
                'host' => 'redis',
                'port' => '6379',
                'password' => '',
                'timeout' => '2.5',
                'persistent_identifier' => '',
                'database' => '2',
                'compression_threshold' => '2048',
                'compression_library' => 'gzip',
                'log_level' => '3',
                'max_concurrency' => '6',
                'break_after_frontend' => '5',
                'break_after_adminhtml' => '30',
                'first_lifetime' => '600',
                'bot_first_lifetime' => '60',
                'bot_lifetime' => '7200',
                'disable_locking' => '0',
                'min_lifetime' => '60',
                'max_lifetime' => '2592000'
            ]
        ],
    'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'database' => '0',
                    'port' => '6379'
                ],
            ],
            'page_cache' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'database' => '1',
                    'compress_data' => '0'
                ]
            ]
        ]
    ],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => null
        ]
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'google_product' => 1,
        'full_page' => 0,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1
    ],
    'downloadable_domains' => [
        'magento.loc'
    ],
    'install' => [
        'date' => 'Fri, 03 Jan 2020 18:20:36 +0000'
    ],
    'system' => [
        'default' => [
            'web' => [
                'unsecure' => [
                    'base_url' => 'http://magento2.loc/',
                    'base_link_url' => '{{unsecure_base_url}}'
                ],
                'secure' => [
                    'base_url' => 'http://magento2.loc/',
                    'base_link_url' => '{{secure_base_url}}'
                ],
            ],
        ]
    ]
];
