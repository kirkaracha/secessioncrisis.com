<?php /** @noinspection PhpUnused */

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property-read string $full_name
 * @property-read string $citation_name
 */
#[Fillable([
    'first_name',
    'middle_name',
    'last_name',
])]
final class Author extends BaseModel
{
    /** @use HasFactory<AuthorFactory> */
    use HasFactory;

    public function citations(): BelongsToMany
    {
        return $this->belongsToMany(related: Citation::class, table: 'author_citations')
            ->withPivot(columns: 'author_order')
            ->orderByPivot(column: 'author_order');
    }

    public function getFullNameAttribute(): string
    {
        if ($this->middle_name) {
            return trim(string: "$this->first_name $this->middle_name $this->last_name");
        }

        return trim(string: "$this->first_name $this->last_name");
    }

    public function getCitationNameAttribute(): string
    {
        $initial = $this->first_name ? mb_substr($this->first_name, 0, 1) . '.' : '';

        return trim(string: "$this->last_name, $initial");
    }
}
