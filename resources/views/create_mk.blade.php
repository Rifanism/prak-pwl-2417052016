@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Buat Mata Kuliah Baru</h1>
    </div>

    <div class="page-header__actions">
        <a href="{{ route('matakuliah.index') }}" class="btn btn--secondary">Kembali</a>
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
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="nama_mk" class="field__label">Nama Mata Kuliah <span class="field__req">*</span></label>
                    <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk') }}" class="field__control" required>
                    @error('nama_mk')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="sks" class="field__label">SKS <span class="field__req">*</span></label>
                    <input type="number" id="sks" name="sks" value="{{ old('sks') }}" min="1" max="6" class="field__control" required>
                    @error('sks')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="stack-form-actions">
                    <button type="submit" class="btn btn--primary">Submit</button>
                    <a href="{{ route('matakuliah.index') }}" class="link-quiet">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
