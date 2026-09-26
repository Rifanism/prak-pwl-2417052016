<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected Mahasiswa $mahasiswa,
        protected Kelas $kelas,
    ) {}

    public function create()
    {
        $data = [
            'title' => 'Create User',
            'kelas' => $this->kelas->getKelas(),
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:255'],
            'kelas_id' => ['required', 'exists:kelas,id'],
        ]);

        $this->mahasiswa->create($validated);

        return redirect()->to('/user');
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'mahasiswa' => $this->mahasiswa->getMahasiswa(),
        ];

        return view('list_user', $data);
    }
}
