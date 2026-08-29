<?php

declare(strict_types=1);

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

$pageSlugs = [
    'bibliography',
    'colophon',
];

Route::get(uri: '/', action: [HomePageController::class, 'index'])
    ->name(name: 'home.index');

Route::get(uri: 'contact', action: [ContactFormController::class, 'create'])
    ->name(name: 'contact.create');

Route::post(uri: 'contact', action: [ContactFormController::class, 'store'])
    ->name(name: 'contact.store');

Route::get(uri: 'contact/thanks', action: [ContactFormController::class, 'show'])
    ->name(name: 'contact.thanks');

Route::get(uri: '{page:slug?}', action: [PageController::class, 'show'])
    ->name(name: 'page.show')
    ->whereIn(parameters: 'slug', values: $pageSlugs);
