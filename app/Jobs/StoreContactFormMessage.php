<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Http\Requests\StoreContactMessageRequest;
use App\Services\ContactFormService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

final class StoreContactFormMessage implements ShouldQueue
{
    use Queueable;

    protected StoreContactMessageRequest $request;

    public function __construct(StoreContactMessageRequest $request)
    {
        $this->request = $request;
    }

    public function handle(ContactFormService $contactFormService): void
    {
        $contactFormService->handle($this->request->validated());
    }
}
