<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => 'AKIAJ2LMZ7OSNKIWOHXA',
            'secret' => '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',
            'region' => 'us-east-1',
            'bucket' => 'myimagebucket333',
        ],

        'cache' => [
            'store' => 'memcached',
            'expire' => 600,
            'prefix' => 'cache-prefix',
        ],

        'ftp' => [
            'driver'   => 'ftp',
            'host'     => 'ftp.asifistiaque.com',
            'username' => 'ai@asifistiaque.com',
            'password' => '03091991',
            'port'     => 21,
            'root'     => 'images',
        ],

    ],

];
