<?php

declare(strict_types=1);

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $contents
 */
#[Fillable([
    'title',
    'contents',
])]
final class Page extends BaseModel
{
    /** @use HasFactory<PageFactory> */
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    // Properties

    public function sluggable(): array
    {
        return $this->getSlugFromTitle();
    }
}
