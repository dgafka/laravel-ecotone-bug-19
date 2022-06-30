<?php

namespace App\Console\Commands;

use App\Domain\Dog\Commands\CreateDogCommand;
use Ecotone\Modelling\CommandBus;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateDog extends Command
{
    protected $signature = 'create:dog';

    protected $description = 'Creates a dog';

    public function handle(CommandBus $commandBus): int
    {
        $commandBus->send(
            new CreateDogCommand(
                dogId: Str::uuid(),
                dogName: 'Fido'
            )
        );

        return 0;
    }
}
