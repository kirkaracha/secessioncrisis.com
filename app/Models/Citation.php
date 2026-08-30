<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AllowedCitationStylesEnum;
use App\Enums\AllowedCitationTypesEnum;
use Database\Factories\CitationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $citation_key
 * @property string $notes
 * @property string $accessed_at
 * @property string $citation_style
 * @property mixed $book
 * @property mixed $website
 * @property mixed $authors
 */
#[Fillable([
    'type',
    'title',
    'citation_key',
    'notes',
    'accessed_at',
    'citation_style',
])]
final class Citation extends BaseModel
{
    /** @use HasFactory<CitationFactory> */
    use HasFactory;

    protected $casts = [
        'accessed_at' => 'date',
        'citation_style' => AllowedCitationStylesEnum::class,
        'type' => AllowedCitationTypesEnum::class,
    ];

    public function book(): HasOne|Citation
    {
        return $this->hasOne(related: BookDetail::class);
    }

    public function website(): HasOne|Citation
    {
        return $this->hasOne(related: WebsiteDetail::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(related: Author::class, table: 'author_reference')
            ->withPivot(columns: 'author_order')
            ->orderBy(column: 'author_order');
    }
}
