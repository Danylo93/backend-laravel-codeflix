<?php

return [
    'queue_name' => env('RABBITMQ_QUEUE'),

    'rabbitmq' => [
        'hosts' => [
            [
                'host' => env('RABBITMQ_HOST', '127.0.0.1'),
                'port' => env('RABBITMQ_PORT', 5672),
                'user' => env('RABBITMQ_USER', 'rabbitmq'),
                'password' => env('RABBITMQ_PASSWORD', 'rabbitmq'),
                'vhost' => env('RABBITMQ_VHOST', '/'),
            ],
        ],
    ],

    'micro_encoder_go' => [
        'exchange' => 'dlx',
        'queue_name' => 'videos',
        'exchange_producer' => 'amq.direct',
    ]
];
