<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \Tenancy\Affects\Connections\Events\Drivers\Configuring::class => [
            \App\Listeners\ConfigureTenantConnection::class
        ],

        \Tenancy\Hooks\Database\Events\Drivers\Configuring::class => [
            \App\Listeners\ConfigureTenantDatabase::class
        ],

        \Tenancy\Hooks\Database\Events\ConfigureDatabaseMutation::class => [
            \App\Listeners\ConfigureTenantDatabaseMutations::class
        ],

        \Tenancy\Hooks\Migration\Events\ConfigureMigrations::class => [
            \App\Listeners\ConfigureTenantMigrations::class
        ],

        \Tenancy\Hooks\Migration\Events\ConfigureSeeds::class => [
            \App\Listeners\ConfigureTenantSeeds::class
        ],

        \Tenancy\Affects\Connections\Events\Resolving::class => [
            \App\Listeners\ResolveTenantConnection::class
        ],

        \Tenancy\Affects\Routes\Events\ConfigureRoutes::class => [
            \App\Listeners\TenantRoutes::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
