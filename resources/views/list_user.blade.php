<x-layouts.app title="Data Mahasiswa">
    <x-page-header
        eyebrow=""
        title="Data Mahasiswa"
        :description="'Seluruh data mahasiswa yang terdaftar pada ' . config('institution.unit') . '.'"
    >
        <x-slot:actions>
            <x-button href="{{ route('user.create') }}">Tambah Mahasiswa</x-button>
        </x-slot:actions>
    </x-page-header>

    @if (session('success'))
        <div class="alert alert--success mb-6">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert--error mb-6">
            <span>Periksa kembali data yang Anda masukkan.</span>
        </div>
    @endif

    @php
        $columns = [
            [
                'key' => 'id',
                'label' => 'No',
                'width' => '4.5rem',
                'numeric' => true,
                'muted' => true,
            ],
            [
                'key' => 'nama',
                'label' => 'Nama Lengkap',
                'strong' => true,
            ],
            [
                'key' => 'npm',
                'label' => 'NPM',
                'width' => '11rem',
                'mono' => true,
                'numeric' => true,
            ],
            [
                'key' => 'kelas.nama_kelas',
                'label' => 'Kelas',
                'width' => '8rem',
                'center' => true,
                'badge' => true,
            ],
        ];
    @endphp

    <x-data-table
        :columns="$columns"
        :rows="$mahasiswa"
        :footer="'Total ' . $mahasiswa->count() . ' mahasiswa terdaftar'"
        empty-title="Belum ada data mahasiswa"
        empty-text="Daftar masih kosong. Tambahkan mahasiswa pertama untuk memulai pencatatan."
    >
        <x-slot:emptyAction>
            <x-button href="{{ route('user.create') }}">Tambah Mahasiswa</x-button>
        </x-slot:emptyAction>
    </x-data-table>
</x-layouts.app>
