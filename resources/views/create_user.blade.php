@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Tambah Mahasiswa</h1>
        <p class="page-header__description">Lengkapi data mahasiswa berikut.</p>
    </div>

    <div class="page-header__actions">
        <a href="{{ route('user.index') }}" class="btn btn--secondary">Kembali</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert--error">
        <span>Periksa kembali data yang Anda masukkan.</span>
    </div>
@endif

<div class="form-narrow">
    <div class="panel">
        <div class="panel__body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="nama" class="field__label">Nama Lengkap <span class="field__req">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="field__control" required>
                    @error('nama')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="npm" class="field__label">NPM <span class="field__req">*</span></label>
                    <input type="text" id="npm" name="npm" value="{{ old('npm') }}" inputmode="numeric" pattern="[0-9]*" maxlength="10" class="field__control" required>
                    <p class="field__hint">Nomor Pokok Mahasiswa, 10 digit numerik tanpa spasi.</p>
                    @error('npm')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="kelas_id" class="field__label">Kelas <span class="field__req">*</span></label>
                    <select id="kelas_id" name="kelas_id" class="field__control field__control--select" required>
                        <option value="">-- Pilih kelas --</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" @selected((string) old('kelas_id') === (string) $item->id)>{{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="stack-form-actions">
                    <button type="submit" class="btn btn--primary">Simpan Data</button>
                    <a href="{{ route('user.index') }}" class="link-quiet">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
