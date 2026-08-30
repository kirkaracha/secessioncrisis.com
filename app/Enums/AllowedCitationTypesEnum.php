<?php

declare(strict_types=1);

namespace App\Enums;

enum AllowedCitationTypesEnum: string
{
    case BOOK = 'book';
    case WEBSITE = 'website';
}
