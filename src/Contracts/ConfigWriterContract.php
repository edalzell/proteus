<?php

namespace Stillat\Proteus\Contracts;

/**
 * Interface ConfigWriterContract
 *
 * Provides a consistent API for interacting with the config writer and the Laravel configuration system.
 *
 * @package Stillat\Proteus\Contracts
 */
interface ConfigWriterContract
{

    /**
     * Attempts to change a single configuration item and write the changes to disk.
     *
     * @param string $key The configuration key.
     * @param mixed $value The value to update.
     * @return bool
     */
    public function write($key, $value);

    /**
     * Attempts to apply multiple changes to a configuration namespace.
     *
     * @param string $configNamespace The configuration namespace.
     * @param array $values The key/value pairs to update.
     * @param bool $isMerge Indiciates if the current operation is a merge, or forced update.
     * @return bool
     */
    public function writeMany($configNamespace, array $values, $isMerge = false);

    /**
     * Attempts to merge multiple changes to a configuration namespace.
     *
     * @param string $configNamespace The configuration namespace.
     * @param array $values The key/value pairs to update.
     * @return bool
     */
    public function mergeMany($configNamespace, array $values);

    /**
     * Checks if a configuration file with the provided key exists.
     *
     * @param string $key The key to check.
     * @return bool
     */
    public function hasConfig($key);

    /**
     * Checks if a configuration file with the provided key exists.
     *
     * @param string $key The key to check.
     * @return array|null
     */
    public function getFile($key);

    /**
     * Prevents changes to the specified configuration level.
     *
     * @param string $entry The configuration item.
     */
    public function guard($entry);

    /**
     * Indicates that all function calls should be ignored when updating configuration files.
     *
     * @return ConfigWriterContract
     */
    public function ignoreFunctionCalls();

    /**
     * Sets a list of configuration keys that should always be preserved.
     *
     * @param array $config
     * @return mixed
     */
    public function preserve($config);

    /**
     * Attempts to update the source configuration and returns the modified document.
     *
     * @param string $key The configuration item to update.
     * @param mixed $value The value to set.
     * @return string
     */
    public function preview($key, $value);

    /**
     * Attempts to apply many changes to a source configuration document and return the modified document.
     *
     * @param string $configNamespace The root configuration namespace.
     * @param array $values The key/value mapping of all changes.
     * @param bool $isMerge Indiciates if the current operation is a merge, or forced update.
     * @return string
     */
    public function previewMany($configNamespace, array $values, $isMerge = false);

}
