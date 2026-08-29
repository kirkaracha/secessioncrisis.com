<?php

declare(strict_types=1);

namespace App\Dtos;

abstract class BaseDto
{
    // https://dev.to/indunilperamuna/enhancing-object-oriented-design-with-traits-interfaces-and-abstract-classes-4647

    public function __construct(array $data = [])
    {
        $this->setFromArray($data);
    }

    public function toArray(): array
    {
        $properties = get_object_vars($this);

        return array_filter($properties, function ($property) {
            return $property !== null;
        });
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    protected function setFromArray(array $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
