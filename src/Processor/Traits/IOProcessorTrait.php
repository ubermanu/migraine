<?php
declare(strict_types=1);

namespace Migraine\Processor\Traits;

/**
 * Trait IOProcessorTrait
 * @package Migraine\Processor\Traits
 */
trait IOProcessorTrait
{
    /**
     * @return string
     */
    abstract function getResourceName(): string;

    /**
     * @return string
     */
    protected function getResourceType(): string
    {
        $resourceType = strtolower($this->getData('type') ?? '');

        if (!empty($resourceType)) {
            return $resourceType;
        }

        $extension = pathinfo($this->getResourceName(), PATHINFO_EXTENSION);

        return strtolower($extension);
    }

    /**
     * @return array
     */
    protected function getResourceOptions(): array
    {
        return $this->getData('options') ?? [];
    }
}
