<?php

namespace App\Console\Commands;

use App\Domain\Dog\Commands\CreateDogCommand;
use App\Models\Dog;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CreateDog extends Command
{
    protected $signature = 'create:dog';

    protected $description = 'Creates a dog';

    public function handle(CommandBus $commandBus): int
    {
        $dogId = Str::uuid();
        $commandBus->send(
            new CreateDogCommand(
                dogId: $dogId,
                dogName: 'Fido_' . Uuid::uuid4()->toString()
            )
        );

        return 0;
    }
}
