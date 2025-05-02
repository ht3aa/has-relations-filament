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
            ->hasTranslations();
    }
}
