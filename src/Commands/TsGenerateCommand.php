<?php

namespace Based\TypeScript\Commands;

use Based\TypeScript\TypeScriptGenerator;
use Illuminate\Console\Command;

class TsGenerateCommand extends Command
{
    public $signature = 'ts:generate';

    public $description = 'Generate TypeScript definitions from PHP classes';

    public function handle()
    {
        $this->call('typescript:generate');
    }
}
