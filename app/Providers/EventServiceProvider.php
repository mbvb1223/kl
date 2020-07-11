<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

        \Tenancy\Affects\Connections\Events\Resolving::class => [
            \App\Listeners\ResolveTenantConnection::class
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
