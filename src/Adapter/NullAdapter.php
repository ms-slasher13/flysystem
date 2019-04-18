<?php

namespace League\Flysystem\Adapter;

use League\Flysystem\Adapter\Polyfill\StreamedCopyTrait;
use League\Flysystem\Adapter\Polyfill\StreamedTrait;
use League\Flysystem\Config;

class NullAdapter extends AbstractAdapter
{
    use StreamedTrait;
    use StreamedCopyTrait;

    /**
     * Check whether a file is present.
     *
     * @param bool $path
     *
     * @return bool
     */
    public function has(bool $path)
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function write(string $path, string $contents, Config $config): array
    {
        $type = 'file';
        $result = compact('contents', 'type', 'path');

        if ($visibility = $config->get('visibility')) {
            $result['visibility'] = $visibility;
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function update(string $path, string $contents, Config $config): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function read(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function rename(string $path, string $newpath): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function delete(string $path): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function listContents(string $directory = '', bool $recursive = false): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getMetadata(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getSize(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getMimetype(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getTimestamp(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getVisibility(string $path): array
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function setVisibility(string $path, string $visibility): array
    {
        return compact('visibility');
    }

    /**
     * @inheritdoc
     */
    public function createDir(string $dirname, Config $config): array
    {
        return ['path' => $dirname, 'type' => 'dir'];
    }

    /**
     * @inheritdoc
     */
    public function deleteDir(string $dirname): bool
    {
        return false;
    }
}
