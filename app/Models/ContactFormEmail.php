<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ContactMessageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
#[Fillable([
    'name',
    'email',
    'subject',
    'message',
    'email_address',
])]
final class ContactFormEmail extends BaseModel
{
    /** @use HasFactory<ContactMessageFactory> */
    use HasFactory;
    use SoftDeletes;
}
