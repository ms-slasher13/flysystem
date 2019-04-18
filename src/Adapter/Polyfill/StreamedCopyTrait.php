<?php

namespace League\Flysystem\Adapter\Polyfill;

use League\Flysystem\Config;

trait StreamedCopyTrait
{
    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy(string $path, string $newpath): bool
    {
        $response = $this->readStream($path);

        if ($response === false || ! is_resource($response['stream'])) {
            return false;
        }

        $result = $this->writeStream($newpath, $response['stream'], new Config());

        if ($result !== false && is_resource($response['stream'])) {
            fclose($response['stream']);
        }

        return $result !== false;
    }

    // Required abstract method

    /**
     * @param  string   $path
     * @return array
     */
    abstract public function readStream(string $path): array;

    /**
     * @param  string   $path
     * @param  resource $resource
     * @param  Config   $config
     * @return array
     */
    abstract public function writeStream(string $path, $resource, Config $config): array;
}
