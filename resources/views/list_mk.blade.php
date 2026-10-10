@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Daftar Mata Kuliah</h1>
    </div>

    <div class="page-header__actions">
        <a href="{{ route('matakuliah.create') }}" class="btn btn--primary">Tambah Mata Kuliah Baru</a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert--success">
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="panel">
    <table class="dt">
        <thead>
            <tr>
                <th class="dt__mono">ID</th>
                <th>Nama Mata Kuliah</th>
                <th class="dt__num">SKS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sks as $mk)
                <tr>
                    <td class="dt__mono dt__muted">{{ $mk->id }}</td>
                    <td class="dt__strong">{{ $mk->nama_mk }}</td>
                    <td class="dt__num">{{ $mk->sks }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn--small btn--primary">Edit</a>
                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn--small btn--danger" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?');">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="dt__muted">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
