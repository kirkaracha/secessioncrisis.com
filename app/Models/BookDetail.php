<?php /** @noinspection PhpUnused */

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BookDetailFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $citation_id
 * @property string $isbn
 * @property string|null $publisher
 * @property string|null $edition
 * @property int|null $publication_year
 * @property string|null $pages
 * @property string|null $city
 */
#[Fillable([
    'citation_id',
    'isbn',
    'publisher',
    'edition',
    'publication_year',
    'pages',
    'city',
])]
final class BookDetail extends BaseModel
{
    /** @use HasFactory<BookDetailFactory> */
    use HasFactory;

    public function citations(): BelongsTo
    {
        return $this->belongsTo(related: Citation::class);
    }
}
