<?php

namespace App\Domain\Dog;

use App\Domain\Dog\Commands\CreateDogCommand;
use App\Domain\Dog\Events\DogWasCreated;
use Ecotone\Modelling\Attribute\AggregateIdentifier;
use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\Attribute\EventSourcingAggregate;
use Ecotone\Modelling\Attribute\EventSourcingHandler;
use Ecotone\Modelling\WithAggregateEvents;
use Ecotone\Modelling\WithAggregateVersioning;

#[EventSourcingAggregate]
final class DogAggregate
{
    use WithAggregateEvents;
    use WithAggregateVersioning;

    #[AggregateIdentifier]
    private string $id;

    #[CommandHandler]
    public static function create(CreateDogCommand $command): self
    {
        $dog = new DogAggregate();

        $dog->recordThat(
            new DogWasCreated($command->dogId, $command->dogName)
        );

        return $dog;
    }

    #[EventSourcingHandler]
    public function applyDogWasCreated(DogWasCreated $event): void
    {
        $this->id = $event->dogId;
    }
}
