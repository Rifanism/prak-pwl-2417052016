@props([
    'eyebrow' => null,
    'title',
    'description' => null,
])

<div class="page-header">
    <div class="min-w-0">
        @if ($eyebrow)
            <p class="page-header__eyebrow">{{ $eyebrow }}</p>
        @endif

        <h1 class="page-header__title">{{ $title }}</h1>

        @if ($description)
            <p class="page-header__description">{{ $description }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="page-header__actions">{{ $actions }}</div>
    @endisset
</div>
