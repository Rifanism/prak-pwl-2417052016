@props([
    'columns' => [],
    'rows',
    'emptyTitle' => 'Belum ada data',
    'emptyText' => 'Data yang ditampilkan akan muncul di sini.',
    'footer' => null,
])

<div class="panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="dt">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th
                            @if ($column['width'] ?? null) style="width: {{ $column['width'] }}" @endif
                            @class([
                                'dt__num' => $column['numeric'] ?? false,
                                'dt__center' => $column['center'] ?? false,
                            ])
                        >
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        @foreach ($columns as $column)
                            <td
                                @class([
                                    'dt__num' => $column['numeric'] ?? false,
                                    'dt__center' => $column['center'] ?? false,
                                    'dt__strong' => $column['strong'] ?? false,
                                    'dt__mono' => $column['mono'] ?? false,
                                    'dt__muted' => $column['muted'] ?? false,
                                    'kelas-badge' => $column['badge'] ?? false,
                                ])
                            >
                                @if (filled($value = data_get($row, $column['key'] ?? null)))
                                    {{ $value }}
                                @else
                                    <span class="dt__muted">&mdash;</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ max(count($columns), 1) }}" class="!p-0">
                            <div class="empty">
                                <p class="empty__title">{{ $emptyTitle }}</p>
                                <p class="empty__text">{{ $emptyText }}</p>

                                @isset($emptyAction)
                                    <div class="empty__action">{{ $emptyAction }}</div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($footer)
        <div class="border-t border-rule px-4 py-2.5 text-sm text-ink-soft">
            {{ $footer }}
        </div>
    @endif
</div>
