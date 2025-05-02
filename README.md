# Has Relations Action for Filament

A Filament action to display related records in a modal.

## Installation

You can install the package via composer:

```bash
composer require ht3aa/has-relations
```

## Usage

In your Filament resource, use the action like this:

```php
use Ht3aa\HasRelations\Actions\HasRelations;

public static function table(Table $table): Table
{
    return $table
        ->actions([
            HasRelations::make()
                ->relations([
                    'relation_name' => ['column1', 'column2'],
                ]),
        ]);
}
```

## Important Note

**Eager Loading Required**: Before using this action, make sure to eager load the relations in your resource's query. This prevents N+1 query issues and ensures optimal performance.

Example of eager loading in your resource:

```php
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->with(['relation_name']);
}
```

## Features

-   Displays related records in a modal
-   Supports multiple relations
-   Customizable columns for each relation
-   Localized messages (English and Arabic supported)
-   Responsive table layout

## Translation

The package comes with English and Arabic translations. To add more languages, create a new translation file in `resources/lang/{language-code}/translations.php`.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
