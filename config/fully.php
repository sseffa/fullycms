<?php

return [

    'cache' => true,

    'per_page' => 10,

    'youtube_api_key' => 'youtube api key',

    /*
    |--------------------------------------------------------------------------
    | Modules config
    |--------------------------------------------------------------------------
    */
    'modules'         => [

        'photo_gallery' => [

            'thumb_size' => [
                'width'  => 150,
                'height' => 150
            ],

            'image_dir' => '/uploads/dropzone/',
            'per_page' => 10,
        ],

        'slider' => [

            'image_size' => [
                'width'  => null,
                'height' => 600
            ],

            'image_dir' => '/uploads/slider/',
        ],

        'article' => [

            'image_size' => [
                'width'  => 730,
                'height' => 290
            ],
            'thumb_size' => [
                'width'  => 64,
                'height' => 64
            ],

            'image_dir' => '/uploads/article/',

            'per_page' => 10,
        ],

        'news' => [

            'image_size' => [
                'width'  => 240,
                'height' => 150
            ],

            'image_dir' => '/uploads/news/',

            'per_page' => 10,
        ],

        'project' => [

            'image_size' => [
                'width'  => 750,
                'height' => 600
            ],
            'thumb_size' => [
                'width'  => 370,
                'height' => 250
            ],

            'image_dir' => '/uploads/project/',

            'category' => ['Bootstrap', 'HTML', 'CSS'],

            'per_page' => 10,
        ],

        'category' => [
            'per_page' => 10,
        ],
        'faq'      => [],
        'page'     => [],
        'video'    => [
            'per_page' => 12,
        ],
        'menu'     => [],
        'setting'  => [],
        'user'     => [],
        'group'    => [],
    ]
];
