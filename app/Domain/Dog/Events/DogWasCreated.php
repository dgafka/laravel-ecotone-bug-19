<?php

namespace App\Domain\Dog\Events;

final class DogWasCreated
{
    public function __construct(
        public readonly string $dogId,
        public readonly string $dogName
    ) {}
}
