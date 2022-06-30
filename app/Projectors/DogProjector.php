<?php

namespace App\Projectors;

use App\Domain\Dog\DogAggregate;
use App\Domain\Dog\Events\DogWasCreated;
use App\Models\Dog;
use Ecotone\EventSourcing\Attribute\Projection;
use Ecotone\EventSourcing\Attribute\ProjectionReset;
use Ecotone\Modelling\Attribute\EventHandler;

#[Projection('dogs', DogAggregate::class)]
final class DogProjector
{
    #[EventHandler]
    public function onDogWasCreated(DogWasCreated $event): void
    {
        Dog::query()->create([
            'id' => $event->dogId,
            'name' => $event->dogName,
        ]);
    }

    #[ProjectionReset]
    public function reset(): void
    {
        Dog::query()->truncate();
    }
}
