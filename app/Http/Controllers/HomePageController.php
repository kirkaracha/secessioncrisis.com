<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class HomePageController extends Controller
{
    public function index(): View
    {
        return view(view: 'home.index');
    }
}
