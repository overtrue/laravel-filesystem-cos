<?php

/*
 * This file is part of the overtrue/laravel-filesystem-cos.
 * (c) overtrue <i@overtrue.me>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\LaravelFilesystem\Cos;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Overtrue\Flysystem\Cos\CosAdapter;

/**
 * Class CosStorageServiceProvider
 */
class CosStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Storage::extend('cos', function () {
            return new Filesystem(new CosAdapter(\config('filesystems.disks.cos')));
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
