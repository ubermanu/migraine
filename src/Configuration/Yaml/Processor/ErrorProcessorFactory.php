<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\AbstractProcessor;
use Migraine\Processor\ErrorProcessor;

/**
 * Class ErrorProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class ErrorProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @inheritDoc
     */
    public function create(): AbstractProcessor
    {
        $processor = new ErrorProcessor();

        if (isset($this->options['error'])) {
            $processor->setMessage($this->options['error']);
        }

        if (isset($this->options['code'])) {
            $processor->setCode($this->options['code']);
        }

        if (isset($this->options['severity'])) {
            $processor->setSeverity($this->options['severity']);
        }

        return $processor;
    }
}
