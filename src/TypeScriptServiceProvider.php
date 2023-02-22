<?php

namespace Based\TypeScript;

use Based\TypeScript\Commands\TypeScriptGenerateCommand;
use Based\TypeScript\Commands\TsGenerateCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TypeScriptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-typescript')
            ->hasConfigFile('typescript')
            ->hasCommand(TypeScriptGenerateCommand::class)
            ->hasCommand(TsGenerateCommand::class);
    }
}
