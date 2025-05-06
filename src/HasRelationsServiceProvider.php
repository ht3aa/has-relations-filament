<?php

namespace Ht3aa\HasRelations;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ht3aa\HasRelations\Livewire\RelationTable;

class HasRelationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('has-relations')
            ->hasViews()
            ->hasTranslations();
    }

    public function packageRegistered()
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => lang_path('vendor/has-relations'),
        ], 'has-relations-translations');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/has-relations'),
        ], 'has-relations-views');
    }

    public function packageBooted()
    {
        Livewire::component('has-relations::livewire.relation-table', RelationTable::class);
    }
}
