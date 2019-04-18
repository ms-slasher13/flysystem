<?php

namespace League\Flysystem;

interface AdapterInterface
{
    /**
     * @const  VISIBILITY_PUBLIC  public visibility
     */
    const VISIBILITY_PUBLIC = 'public';

    /**
     * @const  VISIBILITY_PRIVATE  private visibility
     */
    const VISIBILITY_PRIVATE = 'private';

    /**
     * Check whether a file exists.
     *
     * @param bool $path
     *
     * @return array|bool|null
     */
    public function has(bool $path);

    /**
     * Read a file.
     *
     * @param string $path
     *
     * @return array
     */
    public function read(string $path): array;

    /**
     * Read a file as a stream.
     *
     * @param string $path
     *
     * @return array
     */
    public function readStream(string $path): array;

    /**
     * List contents of a directory.
     *
     * @param string $directory
     * @param bool   $recursive
     *
     * @return array
     */
    public function listContents(string $directory = '', bool $recursive = false): array;

    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array
     */
    public function getMetadata(string $path): array;

    /**
     * Get the size of a file.
     *
     * @param string $path
     *
     * @return array
     */
    public function getSize(string $path): array;

    /**
     * Get the mimetype of a file.
     *
     * @param string $path
     *
     * @return array
     */
    public function getMimetype(string $path): array;

    /**
     * Get the last modified time of a file as a timestamp.
     *
     * @param string $path
     *
     * @return array
     */
    public function getTimestamp(string $path): array;

    /**
     * Get the visibility of a file.
     *
     * @param string $path
     *
     * @return array
     */
    public function getVisibility(string $path): array;

    /**
     * Write a new file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array file meta data
     */
    public function write(string $path, string $contents, Config $config): array;

    /**
     * Write a new file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config Config object
     *
     * @return array   file meta data
     */
    public function writeStream(string $path, $resource, Config $config): array;

    /**
     * Update a file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array file meta data
     */
    public function update(string $path, string $contents, Config $config): array;

    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config Config object
     *
     * @return array file meta data
     */
    public function updateStream(string $path, $resource, Config $config): array;

    /**
     * Rename a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function rename(string $path, string $newpath): bool;

    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy(string $path, string $newpath): bool;

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @return bool
     */
    public function delete(string $path): bool;

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir(string $dirname): bool;

    /**
     * Create a directory.
     *
     * @param string $dirname directory name
     * @param Config $config
     *
     * @return array
     */
    public function createDir(string $dirname, Config $config): array;

    /**
     * Set the visibility for a file.
     *
     * @param string $path
     * @param string $visibility
     *
     * @return array file meta data
     */
    public function setVisibility(string $path, string $visibility): array;
}
