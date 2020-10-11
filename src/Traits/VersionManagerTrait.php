<?php
declare(strict_types=1);

namespace Migraine\Traits;

/**
 * Trait VersionManagerTrait
 * @package Migraine\Traits
 */
trait VersionManagerTrait
{
    /**
     * @var string
     */
    protected string $version;

    /**
     * Initialize the version manager.
     */
    public function initializeVersionManager()
    {
        // TODO: Get version from composer.json
        $this->version = '2';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Returns TRUE of the target version is supported.
     * Used to compare the configuration file version before hand.
     *
     * @param string $targetVersion
     * @return bool|int
     */
    public function supports(string $targetVersion)
    {
        return version_compare($this->version, $targetVersion, '>=');
    }
}
