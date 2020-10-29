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
     * @var string
     */
    protected string $resourceName;

    /**
     * @var string
     */
    protected string $resourceType;

    /**
     * @var array
     */
    protected array $resourceOptions = [];

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    /**
     * @param string $resourceName
     */
    public function setResourceName(string $resourceName): void
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @return string
     */
    protected function getResourceType(): string
    {
        $resourceType = strtolower($this->resourceType ?? '');

        if (!empty($resourceType)) {
            return $resourceType;
        }

        $extension = pathinfo($this->getResourceName(), PATHINFO_EXTENSION);

        return strtolower($extension);
    }

    /**
     * @param string $resourceType
     */
    public function setResourceType(string $resourceType): void
    {
        $this->resourceType = $resourceType;
    }

    /**
     * @return array
     */
    public function getResourceOptions(): array
    {
        return $this->resourceOptions;
    }

    /**
     * @param array $resourceOptions
     */
    public function setResourceOptions(array $resourceOptions): void
    {
        $this->resourceOptions = $resourceOptions;
    }
}
