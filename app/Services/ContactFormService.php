<?php

declare(strict_types=1);

namespace App\Services;

use App\Dtos\ContactEmailDto;
use App\Mail\ContactFormMessage;
use App\Models\ContactFormEmail;
use Illuminate\Support\Facades\Mail;

final class ContactFormService
{
    public function handle(array $email): void
    {
        $dto = $this->getDto(email: $email);

        $this->sendEmail(dto: $dto);

        $this->store(dto: $dto);
    }

    private function getDto(array $email): ContactEmailDto
    {
        $dto = new ContactEmailDto();
        $dto->name = $email['name'];
        $dto->emailAddress = $email['email_address'];
        $dto->message = $email['message'];

        return $dto;
    }

    private function sendEmail(ContactEmailDto $dto): void
    {
        Mail::to('destination@example.com')->send(mailable: new ContactFormMessage($dto));
    }

    private function store(ContactEmailDto $dto): void
    {
        ContactFormEmail::create(attributes: [
            'name' => $dto->name,
            'email_address' => $dto->emailAddress,
            'message' => $dto->message,
        ]);
    }
}
