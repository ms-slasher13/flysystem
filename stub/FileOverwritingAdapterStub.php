<?php

namespace League\Flysystem\Stub;

use League\Flysystem\Adapter\CanOverwriteFiles;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Config;

/**
 * @codeCoverageIgnore
 */
class FileOverwritingAdapterStub implements AdapterInterface, CanOverwriteFiles
{
    public $writtenPath = '';
    public $writtenContents = '';

    public function write(string $path, string $contents, Config $config): array
    {
        $this->writtenPath = $path;
        $this->writtenContents = $contents;

        return true;
    }

    public function writeStream(string $path, $resource, Config $config): array
    {
        $this->writtenPath = $path;
        $this->writtenContents = stream_get_contents($resource);

        return true;
    }

    public function update(string $path, string $contents, Config $config): array
    {

    }

    public function updateStream(string $path, $resource, Config $config): array
    {

    }

    public function rename(string $path, string $newpath): bool
    {

    }

    public function copy(string $path, string $newpath): bool
    {

    }

    public function delete(string $path): bool
    {

    }

    public function deleteDir(string $dirname): bool
    {

    }

    public function createDir(string $dirname, Config $config): array
    {

    }

    public function setVisibility(string $path, string $visibility): array
    {

    }

    public function has(bool $path)
    {

    }

    public function read(string $path): array
    {

    }

    public function readStream(string $path): array
    {

    }

    public function listContents(string $directory = '', bool $recursive = false): array
    {

    }

    public function getMetadata(string $path): array
    {

    }

    public function getSize(string $path): array
    {

    }

    public function getMimetype(string $path): array
    {

    }

    public function getTimestamp(string $path): array
    {

    }

    public function getVisibility(string $path): array
    {

    }
}
