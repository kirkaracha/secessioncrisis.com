<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\AllowedCitationStylesEnum;
use App\Models\Citation;
use InvalidArgumentException;

final class FormatCitationService
{
    public function format(Citation $citation, ?string $style = null): string
    {
        $style = $style ?? $citation->citation_style ?? AllowedCitationStylesEnum::APA;

        return match ($style) {
            AllowedCitationStylesEnum::APA => $this->formatApa($citation),
            AllowedCitationStylesEnum::MLA => $this->formatMla($citation),
            default => throw new InvalidArgumentException(message: "Unsupported citation style: $style"),
        };
    }

    protected function formatApa(Citation $citation): string
    {
        return match ($citation->type) {
            'book' => $this->apaBook($citation),
            'website' => $this->apaWebsite($citation),
        };
    }

    protected function formatMla(Citation $citation): string
    {
        return match ($citation->type) {
            'book' => $this->mlaBook($citation),
            'website' => $this->mlaWebsite($citation),
        };
    }

    protected function apaBook(Citation $citation): string
    {
        $book = $citation->book;
        $authors = $this->authorsApa($citation);
        $year = $book?->publication_year ? "($book->publication_year)" : '(n.d.)';
        $edition = $book?->edition ? " ($book->edition ed.)" : '';
        $publisher = $book?->publisher ?? '';

        return trim(string: "$authors $year. $citation->title$edition. $publisher.");
    }

    protected function apaWebsite(Citation $citation): string
    {
        $site = $citation->website;
        $authors = $this->authorsApa($citation) ?: ($site?->site_name ?? '');
        $date = $site?->published_date?->format('Y, F j') ?? 'n.d.';

        return trim(string: "$authors ($date). $citation->title. $site?->site_name. $site?->url");
    }

    protected function mlaBook(Citation $citation): string
    {
        $book = $citation->book;
        $authors = $this->authorsMla($citation);
        $publisher = $book?->publisher ?? '';
        $year = $book?->publication_year ?? 'n.d.';

        return trim(string: "$authors $citation->title. $publisher, $year.");
    }

    protected function mlaWebsite(Citation $citation): string
    {
        $site = $citation->website;
        $authors = $this->authorsMla($citation);
        $accessed = $site?->last_accessed_at?->format('j F Y') ?? '';

        return trim(string: "$authors \"$citation->title.\" $site?->site_name, $site?->url. Accessed $accessed.");
    }

    protected function authorsApa(Citation $citation): string
    {
        return $citation->authors
            ->map(fn ($author) => $author->citation_name)
            ->implode(', ');
    }

    protected function authorsMla(Citation $citation): string
    {
        $names = $citation->authors->pluck('full_name');

        return match ($names->count()) {
            0 => '',
            1 => "{$names->first()}.",
            2 => "{$names->first()} and {$names->last()}.",
            default => "{$names->first()}, et al.",
        };
    }
}
