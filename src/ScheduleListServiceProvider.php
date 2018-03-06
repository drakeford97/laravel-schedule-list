<?php
declare(strict_types=1);

/**
 * Laravel Artisan Schedule List
 *
 * @author    Kristoffer Högberg <krihog@gmail.com>
 * @link      https://github.com/hmazter/laravel-schedule-list
 */

namespace Hmazter\LaravelScheduleList;

use Illuminate\Support\ServiceProvider;

class ScheduleListServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Console\ListScheduler::class
        ]);
    }
}
