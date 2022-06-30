<?php

namespace App\Providers;

use Doctrine\DBAL\DriverManager;
use Ecotone\Dbal\DbalConnection;
use Enqueue\Dbal\DbalConnectionFactory;
use Illuminate\Support\ServiceProvider;

class EventSourcingProvider extends ServiceProvider
{
    public function register()
    {
        $configuration = $this->convertConfigurationFromLaravelToDoctrine(
            config('database.connections.mysql')
        );

        $this->app->bind(
            DbalConnectionFactory::class, function () use ($configuration) {
                return DbalConnection::create(
                    DriverManager::getConnection($configuration)
                );
            }
        );
    }

    private function convertConfigurationFromLaravelToDoctrine(array $configuration): array
    {
        $map = [
            'username' => 'user',
            'database' => 'dbname',
        ];

        foreach ($map as $laravel => $doctrine) {
            if (isset($map[$laravel])) {
                $configuration[$doctrine] = $configuration[$laravel];

                unset($configuration[$laravel]);
            }
        }

        $configuration['driver'] = match ($configuration['driver']) {
            'mysql' => 'pdo_mysql',
            'sqlite' => 'pdo_sqlite',
            'pgsql' => 'pdo_pgsql',
            'oci' => 'pdo_oci',
            default => $configuration['driver'],
        };

        return $configuration;
    }
}
