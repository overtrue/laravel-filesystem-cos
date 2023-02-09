<?php

namespace Overtrue\LaravelFilesystem\Cos;

use Illuminate\Filesystem\FilesystemAdapter;
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
        Storage::extend('cos', function ($app, $config) {
            $adapter = new CosAdapter($config);

            return new FilesystemAdapter(new Filesystem($adapter), $adapter);
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
