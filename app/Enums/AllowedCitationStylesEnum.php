<?php

declare(strict_types=1);

namespace App\Enums;

enum AllowedCitationStylesEnum: string
{
    case APA = 'apa';
    case MLA = 'mla';
    case Chicago = 'chicago';
}
