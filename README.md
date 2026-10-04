# Laravel filesystem COS

![Laravel Octane Ready Status](https://img.shields.io/badge/Octance-ready-green?style=flat-square)
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/overtrue/laravel-filesystem-cos?style=flat-square)
![GitHub License](https://img.shields.io/github/license/overtrue/laravel-filesystem-cos?style=flat-square)
![Packagist Downloads](https://img.shields.io/packagist/dt/overtrue/laravel-filesystem-cos?style=flat-square)


[Tencent Cloud COS](https://cloud.tencent.com/product/cos) storage for Laravel based on [overtrue/flysystem-cos](https://github.com/overtrue/flysystem-cos).

[![Sponsor me](https://github.com/overtrue/overtrue/blob/master/sponsor-me-button-s.svg?raw=true)](https://github.com/sponsors/overtrue)

# Requirement

-   Laravel >= 9.0

# Installation

```shell
$ composer require "overtrue/laravel-filesystem-cos" -vvv
```

# Configuration

1. Add a new disk to your `config/filesystems.php` config:

```php
<?php

return [
   'disks' => [
       //...
       'cos' => [
           'driver' => 'cos',

            'app_id'     => env('COS_APP_ID'),
            'secret_id'  => env('COS_SECRET_ID'),
            'secret_key' => env('COS_SECRET_KEY'),
            'region'     => env('COS_REGION', 'ap-guangzhou'),

            'bucket'     => env('COS_BUCKET'),  // 不带数字 app_id 后缀
           
            // 可选，如果 bucket 为私有访问请打开此项
            'signed_url' => false,

            // 可选，是否使用 https，默认 false
            'use_https' => true, 

            // 可选，自定义域名
            'domain' => 'emample-12340000.cos.test.com', 

            // 可选，使用 CDN 域名时指定生成的 URL host
            'cdn' => env('COS_CDN'),

            'prefix' => env('COS_PATH_PREFIX'), // 全局路径前缀

            'guzzle' => [
                'timeout' => env('COS_TIMEOUT', 60),
                'connect_timeout' => env('COS_CONNECT_TIMEOUT', 60),
            ],
       ],
       //...
    ]
];
```

> 🚨 请注意：example-1230000001.cos.ap-guangzhou.mycloud.com
>
> 其中：**bucket**: example, **app_id**: 1230000001, **region**: ap-guangzhou

# Usage

```php
$disk = Storage::disk('cos');

// create a file
$disk->put('avatars/filename.jpg', $fileContents);

// check if a file exists
$exists = $disk->has('file.jpg');

// get timestamp
$time = $disk->lastModified('file1.jpg');
$time = $disk->getTimestamp('file1.jpg');

// copy a file
$disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
$disk->move('old/file1.jpg', 'new/file1.jpg');

// get file contents
$contents = $disk->read('folder/my_file.txt');
```

[Full API documentation.](http://flysystem.thephpleague.com/api/)

## :heart: Sponsor me

[![Sponsor me](https://github.com/overtrue/overtrue/blob/master/sponsor-me.svg?raw=true)](https://github.com/sponsors/overtrue)

如果你喜欢我的项目并想支持它，[点击这里 :heart:](https://github.com/sponsors/overtrue)

## Project supported by JetBrains

Many thanks to Jetbrains for kindly providing a license for me to work on this and other open-source projects.

[![](https://resources.jetbrains.com/storage/products/company/brand/logos/jb_beam.svg)](https://www.jetbrains.com/?from=https://github.com/overtrue)

# License

MIT
