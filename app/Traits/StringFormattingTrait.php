<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

trait StringFormattingTrait
{
    public function cleanInput(string $input): string
    {
        return Str::squish($input);
    }

    public function getFirstLetter(string $string): string
    {
        return mb_strimwidth($string, start: 0, width: 1);
    }

    public function lowercase(string $string): string
    {
        return mb_strtolower($string);
    }

    public function uppercase(string $string): string
    {
        return mb_strtoupper($string);
    }

    public function getSlug(string $string): string
    {
        return Str::slug($string);
    }
}
