<?php

return [
    'paths' => ['api/*', 'login', 'logout', 'sanctum/csrf-cookie', 'students', 'users'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:4203'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
