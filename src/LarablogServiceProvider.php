<?php

namespace LyneTechnologies\Larablog;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use LyneTechnologies\Larablog\Commands\LarablogCommand;

class LarablogServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('larablog')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasRoutes('web')
            ->hasMigrations('create_posts_table', 'create_post_categories_table')
            ->hasCommand(LarablogCommand::class);
    }
}
