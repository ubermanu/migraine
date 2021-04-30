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
     * @return string
     */
    public static function getVersion(): string
    {
        return \Composer\InstalledVersions::getRootPackage()['pretty_version'];
    }

    /**
     * Returns TRUE of the target version is supported.
     * Used to compare the configuration file version before hand.
     *
     * @param string $targetVersion
     * @return bool
     */
    public static function supports(string $targetVersion): bool
    {
        return version_compare(static::getVersion(), $targetVersion, '>=');
    }
}
