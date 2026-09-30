@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Data Mahasiswa</h1>
        <p class="page-header__description">Seluruh data mahasiswa yang terdaftar pada {{ config('institution.unit') }}.</p>
    </div>

    <div class="page-header__actions">
        <a href="{{ route('user.create') }}" class="btn btn--primary">Tambah Mahasiswa</a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert--success">
        <span>{{ session('success') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert--error">
        <span>Periksa kembali data yang Anda masukkan.</span>
    </div>
@endif

<div class="panel">
    <table class="dt">
        <thead>
            <tr>
                <th class="dt__num">No</th>
                <th>Nama Lengkap</th>
                <th>NPM</th>
                <th class="dt__center">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $mhs)
                <tr>
                    <td class="dt__num dt__muted">{{ $mhs->id }}</td>
                    <td class="dt__strong">{{ $mhs->nama }}</td>
                    <td class="dt__mono">{{ $mhs->npm }}</td>
                    <td class="dt__center"><span class="kelas-badge">{{ $mhs->kelas->nama_kelas ?? '-' }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="dt__muted">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
