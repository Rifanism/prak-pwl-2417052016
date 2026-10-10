<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct(
        protected Mahasiswa $mahasiswa,
        protected Kelas $kelas,
    ) {}

    public function create()
    {
        $data = [
            'title' => 'Create Mahasiswa',
            'kelas' => $this->kelas->getKelas(),
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => ['required', 'string', 'max:255'],
                'npm' => ['required', 'string', 'digits:10'],
                'kelas_id' => ['required', 'exists:kelas,id'],
            ],
            [
                'nama.required' => 'Nama lengkap wajib diisi.',
                'nama.max' => 'Nama lengkap maksimal 255 karakter.',
                'npm.required' => 'NPM wajib diisi.',
                'npm.digits' => 'NPM harus terdiri dari 10 digit angka.',
                'kelas_id.required' => 'Kelas wajib dipilih.',
                'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
            ]
        );

        $this->mahasiswa->create($validated);

        return redirect()
            ->route('user.index')
            ->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    public function index()
    {
        $data = [
            'title' => 'List Mahasiswa',
            'mahasiswa' => $this->mahasiswa->getMahasiswa(),
        ];

        return view('list_user', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $this->mahasiswa->find($id),
            'kelas' => $this->kelas->getKelas(),
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => ['required', 'string', 'max:255'],
                'npm' => ['required', 'string', 'digits:10'],
                'kelas_id' => ['required', 'exists:kelas,id'],
            ],
            [
                'nama.required' => 'Nama lengkap wajib diisi.',
                'npm.required' => 'NPM wajib diisi.',
                'kelas_id.required' => 'Kelas wajib dipilih.',
            ]
        );

        $this->mahasiswa->find($id)->update($validated);

        return redirect()
            ->route('user.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->mahasiswa->find($id)->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

}
