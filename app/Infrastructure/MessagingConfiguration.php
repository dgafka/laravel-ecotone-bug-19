<?php

namespace App\Infrastructure;

use Ecotone\EventSourcing\ProjectionRunningConfiguration;
use Ecotone\Messaging\Attribute\ServiceContext;

final class MessagingConfiguration
{
    #[ServiceContext]
    public function pollableProjection()
    {
        return ProjectionRunningConfiguration::createPolling('dogs');
    }
}
