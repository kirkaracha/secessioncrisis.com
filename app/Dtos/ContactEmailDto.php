<?php

declare(strict_types=1);

namespace App\Dtos;

final class ContactEmailDto extends BaseDto
{
    public string $name;
    public string $emailAddress;
    public string $message;
}
