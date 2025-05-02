<div >
        @foreach ($templates as $template)
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900" style="margin-bottom: .8rem; margin-top: 2rem;">{{ $template['label'] }}</h3>
                <x-filament-tables::container  style="overflow: auto; max-height: 300px; ">
                    <x-filament-tables::table>
                        @foreach ($template['columns'] as $column)
                            <x-filament-tables::header-cell :wire:key="$template['relation'] . '-' . $column">
                                {{ $column }}
                            </x-filament-tables::header-cell>
                        @endforeach
                    @foreach ($template['tableRecords'] as $record)
                        <x-filament-tables::row >
                            @foreach ($template['columns'] as $column)
                                <x-filament-tables::cell>
                                    <p style="padding: 12px 16px;">
                                        {{ $record[$column] }}
                                    </p>
                                </x-filament-tables::cell>
                            @endforeach
                        </x-filament-tables::row>
                    @endforeach

                    </x-filament-tables::table>

                </x-filament-tables::container>
            </div>
        @endforeach
</div>