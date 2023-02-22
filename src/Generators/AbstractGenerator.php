<?php

namespace Based\TypeScript\Generators;

use Based\TypeScript\Contracts\Generator;
use ReflectionClass;

abstract class AbstractGenerator implements Generator
{
    protected ReflectionClass $reflection;

    public function generate(ReflectionClass $reflection): ?string
    {
        $this->reflection = $reflection;
        $this->boot();

        if (empty(trim($definition = $this->getDefinition()))) {
            return "        {$this->tsClassName()}: {};" . PHP_EOL;
        }

        // Turn namespace style into object style
        $definition = preg_replace('/\.(\w+)/', "['$1']", $definition);

        return <<<TS
                {$this->tsClassName()}: {
                    $definition
                };
        TS;
    }

    protected function boot(): void
    {
        //
    }

    protected function tsClassName(): string
    {
        return str_replace('\\', '.', $this->reflection->getShortName());
    }
}
