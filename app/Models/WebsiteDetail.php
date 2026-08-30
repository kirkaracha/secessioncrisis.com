<?php /** @noinspection PhpUnused */

declare(strict_types=1);

namespace App\Models;

use Database\Factories\WebsiteDetailFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $citation_id
 * @property string $url
 * @property string|null $archive_url
 * @property string|null $site_name
 * @property string|null $published_date
 * @property string|null $last_accessed_at
*/
#[Fillable([
    'citation_id',
    'url',
    'archive_url',
    'site_name',
    'published_date',
    'last_accessed_at',
])]
final class WebsiteDetail extends BaseModel
{
    /** @use HasFactory<WebsiteDetailFactory> */
    use HasFactory;

    public function citations(): BelongsTo
    {
        return $this->belongsTo(related: Citation::class);
    }
}
