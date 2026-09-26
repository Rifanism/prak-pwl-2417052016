<x-layouts.app title="Tambah Mahasiswa">
    <x-page-header
        eyebrow=""
        title="Tambah Mahasiswa"
        description="Lengkapi data mahasiswa berikut."
    >
        <x-slot:actions>
            <x-button variant="secondary" href="{{ route('user.index') }}">Kembali</x-button>
        </x-slot:actions>
    </x-page-header>

    <div class="form-narrow pb-12">
        <div class="panel">
            <form method="POST" action="{{ route('user.store') }}" class="panel__body" novalidate>
                @csrf

                <x-field label="Nama Lengkap" name="nama" required>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Contoh: Rif'an Habibi"
                        autocomplete="off"
                        @class(['field__control', 'field__control--invalid' => $errors->has('nama')])
                        @if ($errors->has('nama')) aria-invalid="true" @endif
                        required
                    >
                </x-field>

                <x-field
                    label="NPM"
                    name="npm"
                    required
                    hint="Nomor Pokok Mahasiswa, 10 digit numerik tanpa spasi."
                >
                    <input
                        type="text"
                        id="npm"
                        name="npm"
                        value="{{ old('npm') }}"
                        placeholder="2417052016"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        maxlength="10"
                        autocomplete="off"
                        @class([
                            'field__control',
                            'font-mono tracking-tight',
                            'field__control--invalid' => $errors->has('npm'),
                        ])
                        @if ($errors->has('npm')) aria-invalid="true" @endif
                        required
                    >
                </x-field>

                <x-field label="Kelas" name="kelas_id" required>
                    <select
                        id="kelas_id"
                        name="kelas_id"
                        @class([
                            'field__control',
                            'field__control--select',
                            'field__control--invalid' => $errors->has('kelas_id'),
                        ])
                        @if ($errors->has('kelas_id')) aria-invalid="true" @endif
                        required
                    >
                        <option value="">— Pilih kelas —</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" @selected((string) old('kelas_id') === (string) $item->id)>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </x-field>

                <div class="stack-form-actions mt-7 border-t border-rule pt-5">
                    <x-button type="submit">Simpan Data</x-button>

                    <a href="{{ route('user.index') }}" class="link-quiet">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
