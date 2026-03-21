<?php

namespace Overtrue\LaravelFilesystem\Cos\Tests;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

class FilesystemCosTest extends TestCase
{
    public function test_it_registers_cos_filesystem_driver(): void
    {
        config()->set('filesystems.disks.cos', [
            'driver' => 'cos',
            'region' => 'ap-shanghai',
            'credentials' => [
                'secretId' => 'dummy',
                'secretKey' => 'dummy',
            ],
            'bucket' => 'dummy',
        ]);

        $disk = Storage::disk('cos');

        $this->assertInstanceOf(FilesystemAdapter::class, $disk);
    }
}
