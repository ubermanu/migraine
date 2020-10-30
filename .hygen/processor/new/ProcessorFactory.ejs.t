---
to: src/Configuration/Yaml/Processor/<%= Name %>ProcessorFactory.php
---
<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\<%= Name %>Processor;

/**
 * Class <%= Name %>Processor
 * @package Migraine\Configuration\Yaml\Processor
 */
class <%= Name %>ProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = <%= Name %>Processor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
    ];
}
