<?php

return [
    'some_key' => env('SOME_ENV_KEY', false),

    'nested' => [
        'key' => [
            'value' => 'inserted-value'
        ],
    ],

];