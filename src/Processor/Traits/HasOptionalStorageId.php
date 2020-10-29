<?php
declare(strict_types=1);

namespace Migraine\Processor\Traits;

/**
 * Trait HasOptionalStorageId
 * @package Migraine\Processor\Traits
 */
trait HasOptionalStorageId
{
    /**
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @return string|null
     */
    public function getStorageId(): ?string
    {
        return $this->storageId;
    }

    /**
     * @param string|null $storageId
     */
    public function setStorageId(?string $storageId): void
    {
        $this->storageId = $storageId;
    }
}
