<?php

namespace Ht3aa\HasRelations;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HasRelationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('has-relations')
            ->hasViews()
            ->hasTranslations()
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => lang_path('vendor/has-relations'),
        ], 'has-relations-translations');
    }
}
