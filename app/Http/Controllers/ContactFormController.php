<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Jobs\StoreContactFormMessage;
use App\Services\ContactFormService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ContactFormController extends Controller
{
    public function __construct(protected ContactFormService $contactFormService)
    {
    }

    public function create(): View
    {
        return view(view: 'contact.create', data: [
            'title' => 'Contact Us',
        ]);
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        StoreContactFormMessage::dispatch($request->validated());

        return redirect()->route(route: 'contact.thanks');
    }

    public function show(): View
    {
        return view(view: 'contact.show', data: [
            'title' => 'Thanks!',
        ]);
    }
}
