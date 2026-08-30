<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AuthorCitationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $author_id
 * @property int $author_order
 * @property int $citation_id
 */
#[Fillable([
    'author_id',
    'author_order',
    'citation_id',
])]
final class AuthorCitation extends BaseModel
{
    /** @use HasFactory<AuthorCitationFactory> */
    use HasFactory;
}
