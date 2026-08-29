<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

final class PageController extends Controller
{
    public function show(Page $page): View
    {
        return view(view: 'pages.show', data: [
            'title' => $page->title,
            'page' => $page,
        ]);
    }
}
