<div>
    @foreach($templates as $template)
        <div class="mb-4">
            <h3 class="text-lg font-medium">{{ $template['label'] }}</h3>
            <table class="w-full">
                <thead>
                    <tr>
                        @foreach($template['columns'] as $column)
                            <th class="px-4 py-2 text-left">{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($template['tableRecords'] as $record)
                        <tr>
                            @foreach($template['columns'] as $column)
                                <td class="px-4 py-2">{{ $record[$column] ?? '' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div> 