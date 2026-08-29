<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('pint:run')]
#[Description('Run Laravel Pint')]
final class RunPint extends Command
{
    public function handle(): void
    {
        $this->info(string: 'Running Laravel Pint...');

        exec(command: './vendor/bin/pint', output: $output);

        $this->info(string: implode(separator: "\n", array: $output));
    }
}
