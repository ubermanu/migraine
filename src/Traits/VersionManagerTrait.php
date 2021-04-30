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
     *
     * @return void
     */
    public function initializeVersionManager(): void
    {
        $this->version = \Composer\InstalledVersions::getRootPackage()['pretty_version'];
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
     * @return bool
     */
    public function supports(string $targetVersion): bool
    {
        return version_compare($this->version, $targetVersion, '>=');
    }
}
