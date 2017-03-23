<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Backend\Log\LogContract;
use App\Repositories\Backend\Log\EloquentLogRepository;
use App\Repositories\Backend\Log\Facades\Log as LogFacade;

/**
 * Class HistoryServiceProvider.
 */
class LogServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LogContract::class, EloquentLogRepository::class);
        $this->app->bind('log', LogContract::class);
        $this->registerFacade();
    }

    public function registerFacade()
    {
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Log', LogFacade::class);
        });
    }
}
