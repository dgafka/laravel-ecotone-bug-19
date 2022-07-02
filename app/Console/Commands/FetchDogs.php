<?php

namespace App\Console\Commands;

use App\Domain\Dog\Commands\CreateDogCommand;
use App\Models\Dog;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class FetchDogs extends Command
{
    protected $signature = 'fetch:dogs';

    protected $description = 'Fetch dogs';

    public function handle(): int
    {
        foreach (Dog::all() as $dog) {
            echo sprintf("Dog numer %d has name %s\n", $dog->id, $dog->name);
        }

        return 0;
    }
}
