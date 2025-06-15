<?php

return [
    'enabled' => env('DEBUGBAR_ENABLED', env('APP_DEBUG', false)),
    'collectors' => [
        'phpinfo'         => true,  // Php version
        'messages'        => true,  // Messages
        'time'           => true,  // Time Datalogger
        'memory'         => true,  // Memory usage
        'exceptions'     => true,  // Exception displayer
        'log'            => true,  // Logs from Monolog (merged in messages if enabled)
        'db'             => true,  // Show database (PDO) queries and bindings
        'views'          => true,  // Views with their data
        'route'          => true,  // Current route information
        'auth'           => true, // Display Laravel authentication status
        'gate'           => true,  // Display Laravel Gate checks
        'session'        => true,  // Display session data
        'symfony_request'=> true,  // Only one can be enabled..
        'mail'           => true,  // Catch mail messages
        'laravel'        => true, // Laravel version and environment
        'events'         => true,  // All events fired
        'default_request'=> false, // Regular or special Symfony request logger
        'logs'           => false, // Add the latest log messages
        'files'          => false, // Show the included files
        'config'         => false, // Display config settings
        'cache'          => false, // Display cache events
        'models'         => false, // Display models
    ],
    'options' => [
        'auth' => [
            'show_name' => true,
        ],
        'db' => [
            'with_params'       => true,   // Render SQL with the parameters substituted
            'backtrace'         => true,   // Use a backtrace to find the origin of the query in your files.
            'timeline'          => false,  // Add the queries to the timeline
            'explain' => [                 // Show EXPLAIN output on queries
                'enabled' => false,
                'types' => ['SELECT'],     // ['SELECT', 'INSERT', 'UPDATE', 'DELETE']; for MySQL 5.6.3+
            ],
            'hints'             => true,    // Show hints for common mistakes
        ],
        'mail' => [
            'full_log' => false,
        ],
        'views' => [
            'data' => false,    //Note: Can slow down the application, because the data can be quite large..
        ],
        'route' => [
            'label' => true,  // show complete route on bar
        ],
        'logs' => [
            'file' => null,
        ],
        'cache' => [
            'values' => true,   // collect cache values
        ],
    ],
    'editor' => env('DEBUGBAR_EDITOR', 'phpstorm'),
    'remote_sites_path' => env('DEBUGBAR_REMOTE_SITES_PATH', ''),
    'local_sites_path' => env('DEBUGBAR_LOCAL_SITES_PATH', ''),
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'restore_button' => false, // Disable the restore button
]; 