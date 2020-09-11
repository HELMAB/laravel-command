<?php

namespace Asorasoft\Command;

use Asorasoft\Command\Commands\ChangeUserPasswordCommand;
use Illuminate\Support\ServiceProvider;

class AsorasoftCommandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            ChangeUserPasswordCommand::class,
        ]);
    }
}