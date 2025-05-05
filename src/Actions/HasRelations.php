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
                $this->generateTemplates();

                return new HtmlString(view('has-relations::has-relations', [
                    'templates' => $this->templates,
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

    public function generateTemplates()
    {
        foreach ($this->relations as $relation => $relationData) {
            $count = $this->getRecord()->{$relation}->count();

            $this->templates[] = [
                'count' => $count,
                'relation' => $relation,
                'label' => __('has-relations::translations.has-relations.there-are-x-records-in-x-relation', [
                    'count' => $count,
                    'relation' => __('has-relations::translations.has-relations.' . str($relation)->singular() . '.label'),
                ]),
                'columns' => isset($relationData['columns']) ? $relationData['columns'] : [],
                'tableRecords' => $this->getRecord()->{$relation},
                'resource' => isset($relationData['resource']) ? $relationData['resource'] : '#',
            ];
        }
    }
}
