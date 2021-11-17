<?php

return [
    'valid_formats' => ['json', 'xml', 'csv'],
    'config' => [
        'csv' => [
            'values_separator' => ',',
            'line_separator' => PHP_EOL,
            'has_header' => true,
            'columns' => [
                'first_name' => 0,
                'age' => 1,
                'gender' => 2,
            ]
        ],
        'json' => [
            'columns' => [
                'first_name' => 'first_name',
                'age' => 'age',
                'gender' => 'gender',
            ]
        ],
        'xml' => [
            'columns' => [
                'first_name' => 'first_name',
                'age' => 'age',
                'gender' => 'gender',
            ],
            'root_node' => 'items',
            'element_node' => 'item'
        ]
    ]
];
