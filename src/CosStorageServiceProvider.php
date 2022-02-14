<?php

namespace Overtrue\LaravelFilesystem\Cos;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Overtrue\Flysystem\Cos\CosAdapter;

class CosStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Storage::extend('cos', function () {
            $adapter = new CosAdapter(\config('filesystems.disks.cos'));

            return new Filesystem($adapter);
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
