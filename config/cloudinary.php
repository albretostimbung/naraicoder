<?php

return [
    'cloud_url' => env('CLOUDINARY_URL'),

    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key'    => env('CLOUDINARY_KEY'),
        'api_secret' => env('CLOUDINARY_SECRET'),
    ],

    'presets' => [
        'events'  => env('CLOUDINARY_PRESET_EVENTS', 'events'),
    ],
];
