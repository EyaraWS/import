<?php

namespace Darkilliant\ProcessBundle\Configuration;

class ConfigurationProcess
{
    /** @var ConfigurationStep[] */
    private $steps;

    private $logger;

    /** @var array */
    private $deprecated;

    private function __construct(string $logger, array $steps, array $deprecated)
    {
        $this->logger = $logger;
        $this->steps = $steps;
        $this->deprecated = $deprecated;
    }

    public static function create(array $config): ConfigurationProcess
    {
        return new self(
            $config['logger'] ?? 'process_logger_default',
            array_map([ConfigurationStep::class, 'create'], $config['steps']),
            $config['deprecated'] ?? []
        );
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function getLogger(): string
    {
        return $this->logger;
    }

    public function getDeprecated(): array
    {
        return $this->deprecated;
    }
}
