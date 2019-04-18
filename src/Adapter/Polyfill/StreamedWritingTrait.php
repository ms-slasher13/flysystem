<?php

namespace League\Flysystem\Adapter\Polyfill;

use League\Flysystem\Config;
use League\Flysystem\Util;

trait StreamedWritingTrait
{
    /**
     * Stream fallback delegator.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config
     * @param string   $fallback
     *
     * @return mixed fallback result
     */
    protected function stream(string $path, $resource, Config $config, string $fallback): array
    {
        Util::rewindStream($resource);
        $contents = stream_get_contents($resource);
        $fallbackCall = [$this, $fallback];

        return call_user_func($fallbackCall, $path, $contents, $config);
    }

    /**
     * Write using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config
     *
     * @return array   file metadata
     */
    public function writeStream(string $path, $resource, Config $config): array
    {
        return $this->stream($path, $resource, $config, 'write');
    }

    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object or visibility setting
     *
     * @return array   file metadata
     */
    public function updateStream(string $path, $resource, Config $config): array
    {
        return $this->stream($path, $resource, $config, 'update');
    }

    // Required abstract methods
    abstract public function write(string $path, string $contents, Config $config);
    abstract public function update(string $path, string $contents, Config $config);
}
