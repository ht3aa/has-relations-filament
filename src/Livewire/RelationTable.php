<?php

namespace Ht3aa\HasRelations\Livewire;

use App\Models\Shop\Customer;
use Livewire\Component;


class RelationTable extends Component
{

    public array $templates;

    public $record;

    public array $relations;

    public function mount(array $relations, $record)
    {
        $this->relations = $relations;
        $this->record = $record;

        $this->generateTemplates();
    }

    private function generateTemplates()
    {
        $this->templates = [];

        foreach ($this->relations as $relation => $relationData) {
            $count = $this->record->{$relation}->count();

            $this->templates[] = [
                'count' => $count,
                'relation' => $relation,
                'record' => $this->record,
                'label' => __('has-relations::translations.has-relations.there-are-x-records-in-x-relation', [
                    'count' => $count,
                    'relation' => __('has-relations::translations.has-relations.' . str($relation)->singular() . '.label'),
                ]),
                'columns' => isset($relationData['columns']) ? $relationData['columns'] : [],
                'tableRecords' => $this->record->{$relation},
                'resource' => isset($relationData['resource']) ? $relationData['resource'] : '#',
            ];
        }
    }

    public function deleteAction($templateIndex, $relation, $id)
    {
        $this->templates[$templateIndex]['record']->{$relation}->find($id)->delete();


        $this->generateTemplates();
    }

    public function render()
    {
        return view('has-relations::livewire.relation-table');
    }
}
