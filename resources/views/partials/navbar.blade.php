@php
    $links = [
        ['label' => 'Data Mahasiswa', 'route' => 'user.index'],
        ['label' => 'Tambah Mahasiswa', 'route' => 'user.create'],
        ['label' => 'Data Mata Kuliah', 'route' => 'matakuliah.index'],
        ['label' => 'Tambah Mata Kuliah', 'route' => 'matakuliah.create'],
        ['label' => 'Profile', 'route' => 'profile'],
    ];
@endphp

<nav class="navbar" aria-label="Navigasi utama">
    <div class="container-page navbar__inner">
        <a href="{{ route('user.index') }}" class="navbar__brand">
            <span class="navbar__wordmark">
                <span class="navbar__name">{{ config('institution.name') }}</span>
                <span class="navbar__unit">{{ config('institution.unit') }}</span>
            </span>
        </a>

        <div class="navbar__links">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="navbar__link {{ request()->routeIs($link['route']) ? 'navbar__link--active' : '' }}"
                    @if (request()->routeIs($link['route'])) aria-current="page" @endif
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
