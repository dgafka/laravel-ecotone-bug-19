<?php

namespace App\Domain\Dog\Commands;

final class CreateDogCommand
{
    public function __construct(
        public readonly string $dogId,
        public readonly string $dogName
    ) {}
}
