<?php

namespace Ht3aa\HasRelations\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Support\HtmlString;

class HasRelations extends Action
{
    public ?array $relations = null;

    protected ?array $templates = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->modalSubmitAction(false)
            ->icon('heroicon-o-information-circle')
            ->color('danger')
            ->label(__('has-relations::translations.has-relations.has-relations'))
            ->modalDescription(new HtmlString(''))
            ->modalContentFooter(function () {

                return new HtmlString(view('has-relations::has-relations', [
                    'relations' => $this->relations,
                    'record' => $this->getRecord(),
                ]));
            });
    }

    public static function make(?string $name = 'has-relations'): static
    {
        return parent::make($name);
    }

    public function relations(array $relations): self
    {
        $this->relations = $relations;

        return $this;
    }
}
