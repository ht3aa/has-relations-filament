<div>
        @foreach ($this->templates as $templateIndex => $template)
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900" style="margin-bottom: .8rem; margin-top: 2rem;">
                    {{ $template['label'] }}
                </h3>
                <x-filament-tables::container  style="overflow: auto; max-height: 300px; ">
                    <x-filament-tables::table>
                        @foreach ($template['columns'] as $column)
                            <x-filament-tables::header-cell :wire:key="$template['relation'] . '-' . $column">
                                {{ __('has-relations::translations.has-relations.' . str($template['relation'])->singular() . '.' . $column) }}
                            </x-filament-tables::header-cell>
                        @endforeach
                    @foreach ($template['tableRecords'] as $record)
                        @can('update', $record)
                            <x-filament-tables::row wire:key="$template['relation'] . '-' . $record->id">
                                @foreach ($template['columns'] as $column)
                                    <x-filament-tables::cell>
                                            @if ($template['resource'] !== '#')
                                                <a href="{{ $template['resource']::getUrl('edit', ['record' => $record]) }}">
                                                    <p style="padding: 12px 16px;">
                                                        {{ $record->{$column} }}
                                                </p>
                                            </a>
                                            @else
                                                <p style="padding: 12px 16px;">
                                                    {{ $record->{$column} }}
                                                </p>
                                            @endif
                                    </x-filament-tables::cell>
                                @endforeach
                                    @can('delete', $record)
                                        <x-filament-tables::cell x-data="{
                                            isDeleting: false,
                                        }">
                                            <x-filament::button @click="() => {
                                                isDeleting = true;

                                                $wire.call('deleteAction', {{ $templateIndex }}, '{{ $template['relation'] }}', {{ $record->getKey() }})
                                                .then(() => {
                                                    isDeleting = false;
                                                })

                                                }">
                                                <span x-show="!isDeleting">
                                                    {{ __('has-relations::translations.has-relations.delete') }}
                                                </span>
                                                <span x-show="isDeleting">
                                                    <x-filament::loading-indicator class="w-4 h-4" />
                                                </span>
                                            </x-filament::button>
                                        </x-filament-tables::cell>
                                    @endcan
                            </x-filament-tables::row>
                        @endcan
                        @cannot('update', $record)
                            <x-filament-tables::row>
                                @foreach ($template['columns'] as $column)
                                    <x-filament-tables::cell>
                                            <p style="padding: 12px 16px;" >
                                                {{ $record->{$column} }}
                                            </p>
                                    </x-filament-tables::cell>
                                @endforeach
                            </x-filament-tables::row>
                        @endcannot
                    @endforeach

                    </x-filament-tables::table>

                </x-filament-tables::container>
            </div>
        @endforeach
</div>