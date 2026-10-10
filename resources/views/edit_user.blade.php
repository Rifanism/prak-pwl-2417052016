@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Edit Mahasiswa</h1>
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
            <form action="{{ route('user.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="nama" class="field__label">Nama Lengkap <span class="field__req">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="field__control" required>
                    @error('nama')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="npm" class="field__label">NPM <span class="field__req">*</span></label>
                    <input type="text" id="npm" name="npm" value="{{ old('npm', $mahasiswa->npm) }}" class="field__control" required>
                    @error('npm')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="kelas_id" class="field__label">Kelas <span class="field__req">*</span></label>
                    <select name="kelas_id" id="kelas_id" class="field__control" required>
                        <option value="" disabled {{ old('kelas_id') == null ? 'selected' : '' }}></option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="stack-form-actions">
                    <button type="submit" class="btn btn--primary">Update</button>
                    <a href="{{ route('user.index') }}" class="link-quiet">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
