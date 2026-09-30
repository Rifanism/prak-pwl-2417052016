<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Mata Kuliah',
            'sks' => Matakuliah::all(),
        ];

        return view('list_mk', $data);
    }

    public function create()
    {
        return view('create_mk', ['title' => 'Create Mata Kuliah']);
    }

    public function store(Request $req)
    {
        $validated = $req->validate(
            [
                'nama_mk' => ['required', 'string', 'max:100'],
                'sks' => ['required', 'integer', 'min:1', 'max:6'],
            ],
            [
                'nama_mk.required' => 'Nama mata kuliah wajib diisi.',
                'nama_mk.max' => 'Nama mata kuliah maksimal 100 karakter.',
                'sks.required' => 'SKS wajib diisi.',
                'sks.integer' => 'SKS harus berupa angka.',
                'sks.min' => 'SKS minimal 1.',
                'sks.max' => 'SKS maksimal 6.',
            ]
        );

        Matakuliah::create($validated);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Mata kuliah berhasil disimpan.');
    }
}
