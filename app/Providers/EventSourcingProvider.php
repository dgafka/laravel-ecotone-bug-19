<?php

namespace App\Providers;

use Ecotone\Dbal\DbalConnection;
use Enqueue\Dbal\DbalConnectionFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class EventSourcingProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            DbalConnectionFactory::class, function () {
                return DbalConnection::create(
                    DB::connection('mysql')->getDoctrineConnection()
                );
            }
        );
    }
}
